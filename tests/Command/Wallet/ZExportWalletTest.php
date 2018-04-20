<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZExportWalletTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_exportwallet',
            'params' => ['/my/file']
        ];

        $this->assertEquals($expected, (new ZExportWallet('/my/file'))->jsonSerialize());
    }
}
