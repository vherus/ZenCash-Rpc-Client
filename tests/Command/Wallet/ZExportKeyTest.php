<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZExportKeyTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_exportkey',
            'params' => ['myaddress']
        ];

        $this->assertEquals($expected, (new ZExportKey('myaddress'))->jsonSerialize());
    }
}
