<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZListReceivedByAddressTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_listreceivedbyaddress',
            'params' => ['myaddress', 1]
        ];

        $this->assertEquals($expected, (new ZListReceivedByAddress('myaddress'))->jsonSerialize());
    }

    public function test_serialize_with_minconf_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_listreceivedbyaddress',
            'params' => ['myaddress', 23]
        ];

        $this->assertEquals($expected, (new ZListReceivedByAddress('myaddress', 23))->jsonSerialize());
    }
}
