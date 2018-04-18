<?php

namespace ZenCash\Rpc\Validation\Mining;

use PHPUnit\Framework\TestCase;
use ZenCash\Rpc\Validation\Exception\JsonFormatException;

class GetBlockTemplateValidatorTest extends TestCase
{
    public function test_invalid_json_structure_throws_exception()
    {
        $invalidJson = <<<JSON
{
    "trailing_comma": "",
}
JSON;

        $this->expectException(JsonFormatException::class);
        GetBlockTemplateValidator::validate($invalidJson);
    }

    public function test_mode_set_to_template_is_all_good()
    {
        $validJson = <<<JSON
{
    "mode": "template"
}
JSON;

        GetBlockTemplateValidator::validate($validJson);
        $this->addToAssertionCount(1);
    }

    public function test_setting_mode_to_anything_other_than_template_throws_exception()
    {
        $invalidJson = <<<JSON
{
    "mode": "ztemplate"
}
JSON;

        $this->expectException(JsonFormatException::class);
        GetBlockTemplateValidator::validate($invalidJson);
    }

    public function test_passing_array_to_capabilities_is_all_good()
    {
        $validJson = <<<JSON
{
    "capabilities": []
}
JSON;

        GetBlockTemplateValidator::validate($validJson);
        $this->addToAssertionCount(1);
    }

    public function test_capabilities_not_being_an_array_throws_exception()
    {
        $invalidJson = <<<JSON
{
    "capabilities": true
}
JSON;

        $this->expectException(JsonFormatException::class);
        GetBlockTemplateValidator::validate($invalidJson);
    }

    public function test_string_array_of_capabilities_is_all_good()
    {
        $validJson = <<<JSON
{
    "capabilities": [
        "support",
        "longpoll"
    ]
}
JSON;

        GetBlockTemplateValidator::validate($validJson);
        $this->addToAssertionCount(1);
    }

    public function test_adding_anything_but_strings_to_capabilities_array_throws_exception()
    {
        $invalidJson = <<<JSON
{
    "capabilities": [
        "support",
        "longpoll",
        23
    ]
}
JSON;

        $this->expectException(JsonFormatException::class);
        GetBlockTemplateValidator::validate($invalidJson);
    }
}
