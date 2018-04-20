<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZImportWalletTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_importwallet',
            'params' => ['/my/file']
        ];

        $this->assertEquals($expected, (new ZImportWallet('/my/file'))->jsonSerialize());
    }
}
