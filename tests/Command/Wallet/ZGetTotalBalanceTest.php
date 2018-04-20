<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZGetTotalBalanceTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_gettotalbalance',
            'params' => [1]
        ];

        $this->assertEquals($expected, (new ZGetTotalBalance)->jsonSerialize());
    }

    public function test_serialize_with_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_gettotalbalance',
            'params' => [32]
        ];

        $this->assertEquals($expected, (new ZGetTotalBalance(32))->jsonSerialize());
    }
}
