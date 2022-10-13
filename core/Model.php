<?php


namespace app\core;


abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_URL = 'url';
    public const RULE_EMAIL= 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

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
;
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

                if ($checked_rule === self::RULE_EMAIL && filter_var($checked_attr, FILTER_VALIDATE_EMAIL))
                {
                    $this->addError($attribute, self::RULE_EMAIL);
                }

                if($checked_rule === self::RULE_MIN && strlen($checked_attr)<$rule['min']){
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }

                if($checked_rule === self::RULE_MAX && strlen($checked_attr)<$rule['max']){
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }

//                if($checked_rule === self::RULE_MATCH && $checked_attr !== $this->{$rule['match']}){
//                    $this->addError($attribute, self::RULE_MATCH, $rule);
//                }
            }
        }

        return empty($this->errors);
    }



    private function addError(string $attribute, string $rule, $params= [])
    {
        $error_message = $this->getErrorMessages()[$rule] ?? '';

        $this->errors[$attribute][] = $error_message;

        foreach ($params as $key => $attribute){
            $error_message = str_replace("{{$key}}", $attribute, $error_message);
        }
    }

    private function getErrorMessages(): array
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_URL => 'Entered URL is invalid',
            self::RULE_EMAIL => 'The field must be valid email address',
            self::RULE_MIN=> 'Minimum length of a password is {min}',
            self::RULE_MAX=> 'Maximum length of a password is {max}',
            self::RULE_MATCH=> 'Passwords are not matching',
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