<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZGetBalanceTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_getbalance',
            'params' => ['myaddress', 1]
        ];

        $this->assertEquals($expected, (new ZGetBalance('myaddress'))->jsonSerialize());
    }

    public function test_serialize_with_minconf_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_getbalance',
            'params' => ['myaddress', 29]
        ];

        $this->assertEquals($expected, (new ZGetBalance('myaddress', 29))->jsonSerialize());
    }
}
