<?php

namespace ZenCash\Rpc\Command\Network;

use PHPUnit\Framework\TestCase;

class GetNetworkInfoTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getnetworkinfo'
        ];

        $this->assertEquals($expected, (new GetNetworkInfo)->jsonSerialize());
    }
}
