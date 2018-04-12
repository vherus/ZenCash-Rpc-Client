<?php

namespace ZenCash\Rpc\Command\Mining;

use PHPUnit\Framework\TestCase;

class GetLocalSolpsTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getlocalsolps'
        ];

        $this->assertEquals($expected, (new GetLocalSolps)->jsonSerialize());
    }
}
