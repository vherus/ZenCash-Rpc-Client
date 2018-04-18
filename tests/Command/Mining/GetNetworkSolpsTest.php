<?php

namespace ZenCash\Rpc\Command\Mining;

use PHPUnit\Framework\TestCase;

class GetNetworkSolpsTest extends TestCase
{
    public function test_serialize_without_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getnetworksolps',
            'params' => [120, -1]
        ];

        $this->assertEquals($expected, (new GetNetworkSolps)->jsonSerialize());
    }

    public function test_serialize_with_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getnetworksolps',
            'params' => [900, 23]
        ];

        $this->assertEquals($expected, (new GetNetworkSolps(900, 23))->jsonSerialize());
    }
}
