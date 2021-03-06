<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class DumpWalletTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'dumpwallet',
            'params' => ['/my/file']
        ];

        $this->assertEquals($expected, (new DumpWallet('/my/file'))->jsonSerialize());
    }
}
