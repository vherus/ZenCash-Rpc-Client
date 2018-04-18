<?php

namespace ZenCash\Rpc\Command\Generating;

use PHPUnit\Framework\TestCase;

class GenerateTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'generate',
            'params' => [23]
        ];

        $this->assertEquals($expected, (new Generate(23))->jsonSerialize());
    }
}
