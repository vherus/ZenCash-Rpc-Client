<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ImportPrivKeyTest extends TestCase
{
    public function test_serialize_with_default_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'importprivkey',
            'params' => ['mykey', '', true]
        ];

        $this->assertEquals($expected, (new ImportPrivKey('mykey'))->jsonSerialize());
    }

    public function test_serialize_with_label_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'importprivkey',
            'params' => ['mykey', 'mylabel', true]
        ];

        $this->assertEquals($expected, (new ImportPrivKey('mykey', 'mylabel'))->jsonSerialize());
    }

    public function test_serialize_with_rescan_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'importprivkey',
            'params' => ['mykey', 'mylabel', false]
        ];

        $this->assertEquals($expected, (new ImportPrivKey('mykey', 'mylabel', false))->jsonSerialize());
    }
}
