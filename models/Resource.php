<?php

namespace app\models;

use app\core\DBModel;


class Resource extends DBModel
{
    public string $url;
    public int $type_id;
    public string $title;
    public string $description;


    function create(): bool
    {
        return $this->save();
    }

    function search(): array
    {
        return $this->getAll(
            [
                'resource_types' => ['type_id' => 't_id']
            ]);
    }

    function searchById(array $params)
    {

        return $this->getOne($params);
    }

    function updateById(array $params)
    {
        return $this->update($params);
    }
    function deleteById(array $params)
    {
        return $this->delete($params);
    }


    public function getValidationRules(): array
    {
        return [
            'url' => [self::RULE_REQUIRED],
            'title' => [self::RULE_REQUIRED]
        ];
    }


    public function getTable(): string
    {
        return 'resources';
    }

    function getAttributes(): array
    {
        return ['type_id', 'url', 'title', 'description'];
    }
}