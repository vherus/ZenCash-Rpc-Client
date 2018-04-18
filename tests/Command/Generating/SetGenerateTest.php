<?php

namespace ZenCash\Rpc\Command\Generating;

use PHPUnit\Framework\TestCase;

class SetGenerateTest extends TestCase
{
    public function test_serialize_without_limit_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'setgenerate',
            'params' => [true]
        ];

        $this->assertEquals($expected, (new SetGenerate(true, null))->jsonSerialize());
    }

    public function test_serialize_with_limit_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'setgenerate',
            'params' => [true, -1]
        ];

        $this->assertEquals($expected, (new SetGenerate(true, -1))->jsonSerialize());
    }
}
