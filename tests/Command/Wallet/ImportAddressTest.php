<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ImportAddressTest extends TestCase
{
    public function test_serialize_with_default_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'importaddress',
            'params' => ['myaddress', '', true]
        ];

        $this->assertEquals($expected, (new ImportAddress('myaddress'))->jsonSerialize());
    }

    public function test_serialize_with_label_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'importaddress',
            'params' => ['myaddress', 'mylabel', true]
        ];

        $this->assertEquals($expected, (new ImportAddress('myaddress', 'mylabel'))->jsonSerialize());
    }

    public function test_serialize_with_rescan_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'importaddress',
            'params' => ['myaddress', 'mylabel', false]
        ];

        $this->assertEquals($expected, (new ImportAddress('myaddress', 'mylabel', false))->jsonSerialize());
    }
}
