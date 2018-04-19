<?php

namespace ZenCash\Rpc\Command\Control;

use PHPUnit\Framework\TestCase;

class HelpTest extends TestCase
{
    public function test_serialize_with_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'help',
            'params' => ['getinfo']
        ];

        $this->assertEquals($expected, (new Help('getinfo'))->jsonSerialize());
    }

    public function test_serialize_without_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'help'
        ];

        $this->assertEquals($expected, (new Help(null))->jsonSerialize());
    }
}
