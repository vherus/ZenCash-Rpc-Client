<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ListReceivedByAddressTest extends TestCase
{
    public function test_serialize_with_default_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listreceivedbyaddress',
            'params' => [1, false, false]
        ];

        $this->assertEquals($expected, (new ListReceivedByAddress)->jsonSerialize());
    }

    public function test_serialize_with_minConf_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listreceivedbyaddress',
            'params' => [13, false, false]
        ];

        $this->assertEquals($expected, (new ListReceivedByAddress(13))->jsonSerialize());
    }

    public function test_serialize_with_includeEmpty_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listreceivedbyaddress',
            'params' => [13, true, false]
        ];

        $this->assertEquals($expected, (new ListReceivedByAddress(13, true))->jsonSerialize());
    }

    public function test_serialize_with_includeWatchOnly_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listreceivedbyaddress',
            'params' => [13, true, true]
        ];

        $this->assertEquals($expected, (new ListReceivedByAddress(13, true, true))->jsonSerialize());
    }
}
