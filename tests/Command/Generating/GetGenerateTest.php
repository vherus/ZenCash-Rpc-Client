<?php

namespace ZenCash\Rpc\Command\Generating;

use PHPUnit\Framework\TestCase;

class GetGenerateTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getgenerate'
        ];

        $this->assertEquals($expected, (new GetGenerate)->jsonSerialize());
    }
}
