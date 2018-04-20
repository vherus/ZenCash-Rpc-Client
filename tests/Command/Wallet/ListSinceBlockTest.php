<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ListSinceBlockTest extends TestCase
{
    public function test_serialize_with_null_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listsinceblock',
            'params' => []
        ];

        $this->assertEquals($expected, (new ListSinceBlock(null, null, null))->jsonSerialize());
    }

    public function test_serialize_with_hash_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listsinceblock',
            'params' => ['myhash']
        ];

        $this->assertEquals($expected, (new ListSinceBlock('myhash', null, null))->jsonSerialize());
    }

    public function test_serialize_with_confirms_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listsinceblock',
            'params' => ['myhash', 23]
        ];

        $this->assertEquals($expected, (new ListSinceBlock('myhash', 23, null))->jsonSerialize());
    }

    public function test_serialize_with_watchOnly_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listsinceblock',
            'params' => ['myhash', 23, true]
        ];

        $this->assertEquals($expected, (new ListSinceBlock('myhash', 23, true))->jsonSerialize());
    }
}
