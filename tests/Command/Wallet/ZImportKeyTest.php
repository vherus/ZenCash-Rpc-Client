<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;
use ZenCash\Rpc\Command\Wallet\ZImportKey\Rescan;

class ZImportKeyTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_importkey',
            'params' => ['mykey', 'whenkeyisnew', 0]
        ];

        $this->assertEquals($expected, (new ZImportKey('mykey', null))->jsonSerialize());
    }

    public function test_serialize_with_rescan_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_importkey',
            'params' => ['mykey', 'yes', 0]
        ];

        $this->assertEquals($expected, (new ZImportKey('mykey', Rescan::YES()))->jsonSerialize());
    }

    public function test_serialize_with_height_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_importkey',
            'params' => ['mykey', 'no', 92]
        ];

        $this->assertEquals($expected, (new ZImportKey('mykey', Rescan::NO(), 92))->jsonSerialize());
    }
}
