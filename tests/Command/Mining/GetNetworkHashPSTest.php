<?php

namespace ZenCash\Rpc\Command\Mining;

use PHPUnit\Framework\TestCase;

class GetNetworkHashPSTest extends TestCase
{
    public function test_serialize_without_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getnetworkhashps',
            'params' => [120, -1]
        ];

        $this->assertEquals($expected, (new GetNetworkHashPS)->jsonSerialize());
    }

    public function test_serialize_with_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getnetworkhashps',
            'params' => [900, 23]
        ];

        $this->assertEquals($expected, (new GetNetworkHashPS(900, 23))->jsonSerialize());
    }
}
