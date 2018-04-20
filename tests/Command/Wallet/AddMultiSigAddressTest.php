<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class AddMultiSigAddressTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'addmultisigaddress',
            'params' => [2, ['key1', 'key2']]
        ];

        $this->assertEquals($expected, (new AddMultiSigAddress(2, ['key1', 'key2']))->jsonSerialize());
    }
}
