<?php


namespace app\core;


abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_URL = 'url';
    public const RULE_PASSWORD = 'password';

    public array $errors = [];

    public function loadData(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }

    }

    public abstract function getValidationRules(): array;

    public function validateData(): bool
    {
        foreach ($this->getValidationRules() as $attribute => $rules) {

            $checked_attr = $this->{$attribute};
            foreach ($rules as $rule) {
                $checked_rule = $rule;
                if (is_array($checked_rule)) {
                    $checked_rule = $rule[0];
                }
                if ($checked_rule === self::RULE_REQUIRED && !$checked_attr) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }

                if ($checked_rule === self::RULE_URL && filter_var($checked_attr, FILTER_VALIDATE_URL)) {
                    $this->addError($attribute, self::RULE_URL);
                }
            }
        }
        return empty($this->errors);
    }



    private function addError(string $attribute, string $rule)
    {
        $error_message = $this->getErrorMessages()[$rule] ?? '';

        $this->errors[$attribute][] = $error_message;
    }

    private function getErrorMessages(): array
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_URL => 'Entered URL is invalid',
        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }
}