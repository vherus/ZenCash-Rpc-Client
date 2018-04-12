<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class GetNewAddressTest extends TestCase
{
    public function test_serialize_constructs_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getnewaddress',
        ];

        $this->assertEquals($expected, (new GetNewAddress)->jsonSerialize());
    }
}
