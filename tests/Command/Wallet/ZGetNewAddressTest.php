<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZGetNewAddressTest extends TestCase
{
    public function test_serialize_constructs_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_getnewaddress',
        ];

        $this->assertEquals($expected, (new ZGetNewAddress)->jsonSerialize());
    }
}
