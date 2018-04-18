<?php

namespace ZenCash\Rpc\Validation;

interface JsonValidator
{
    public static function validate(string $json): void;
}
