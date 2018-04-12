<?php

namespace ZenCash\Rpc\Command\Control;

use PHPUnit\Framework\TestCase;

class GetInfoTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getinfo'
        ];

        $this->assertEquals($expected, (new GetInfo)->jsonSerialize());
    }
}
