<?php


namespace app\core;


abstract class DBModel extends Model
{
    abstract public function getTable(): string;

    abstract function getAttributes();

    public function save(): bool
    {
        $table = $this->getTable();
        $attributes = $this->getAttributes();
        $params = array_map(fn($attribute) => ":$attribute", $attributes);


        $statement = self::prepare("INSERT INTO $table (" . implode(',', $attributes) . ") VALUES (" . implode(',', $params) . ")");


        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        return $statement->execute();

    }

    public function getAll(array $joinedData = []): array
    {
        $table = $this->getTable();
        $query = "SELECT * FROM $table";
        $statement = null;
        if (!empty($joinedData)) {
            foreach ($joinedData as $foreignTable => $joinedFields) {
                foreach ($joinedFields as $currentField => $foreignField) {

                    $query .= " JOIN $foreignTable ON $foreignTable.$foreignField = $table.$currentField";
                }
            }

        }
        $statement = self::prepare($query);
        $statement->execute();


        return $statement->fetchAll();
    }

    public function getOne(array $params)
    {
        $table = $this->getTable();

//        foreach ($params as $attribute => $value) {
//            echo '<pre>';
//            var_dump($attribute,$value);
//            echo '</pre>';
//        }

        $statement = self::prepare("SELECT * FROM $table WHERE id={$params['id']}");
        $statement->execute();
        return $statement->fetch();
    }

    public function update($params)
    {
        $table = $this->getTable();
        $attributes = $this->getAttributes();
        $values = array_map(fn($attribute) => "$attribute=:$attribute", $attributes);

        $statement = self::prepare("UPDATE $table SET " . implode(',', $values) . " WHERE id =:id");


        $statement->bindValue(":id", $params["id"]);


        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        return $statement->execute();
    }

    public function delete(array $params)
    {
        $table = $this->getTable();
        $statement = self::prepare("DELETE FROM $table WHERE id=:id");

        $statement->bindValue(":id",$params["id"]);

        return $statement->execute();
    }

    public static function prepare($query)
    {
        return Application::$app->database->pdo->prepare($query);
    }

}