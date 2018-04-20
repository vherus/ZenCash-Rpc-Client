<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class GetBalanceTest extends TestCase
{
    public function test_serialize_with_default_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getbalance',
            'params' => ['*', 1, false]
        ];

        $this->assertEquals($expected, (new GetBalance)->jsonSerialize());
    }

    public function test_serialize_with_minConf_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getbalance',
            'params' => ['*', 3, false]
        ];

        $this->assertEquals($expected, (new GetBalance(3))->jsonSerialize());
    }

    public function test_serialize_with_watchonly_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getbalance',
            'params' => ['*', 3, true]
        ];

        $this->assertEquals($expected, (new GetBalance(3, true))->jsonSerialize());
    }
}
