<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ListUnspentTest extends TestCase
{
    public function test_serialize_with_default_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listunspent',
            'params' => [1, 9999999]
        ];

        $this->assertEquals($expected, (new ListUnspent)->jsonSerialize());
    }

    public function test_serialize_with_addresses_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listunspent',
            'params' => [1, 9999999, ['addr1', 'addr2']]
        ];

        $this->assertEquals($expected, (new ListUnspent(['addr1', 'addr2']))->jsonSerialize());
    }

    public function test_serialize_with_min_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listunspent',
            'params' => [7, 9999999, ['addr1', 'addr2']]
        ];

        $this->assertEquals($expected, (new ListUnspent(['addr1', 'addr2'], 7))->jsonSerialize());
    }

    public function test_serialize_with_max_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listunspent',
            'params' => [7, 23, ['addr1', 'addr2']]
        ];

        $this->assertEquals($expected, (new ListUnspent(['addr1', 'addr2'], 7, 23))->jsonSerialize());
    }
}
