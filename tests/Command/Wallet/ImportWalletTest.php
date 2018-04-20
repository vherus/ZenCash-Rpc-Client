<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ImportWalletTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'importwallet',
            'params' => ['/my/file']
        ];

        $this->assertEquals($expected, (new ImportWallet('/my/file'))->jsonSerialize());
    }
}
