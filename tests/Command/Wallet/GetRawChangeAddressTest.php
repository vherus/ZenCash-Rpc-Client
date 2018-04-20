<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class GetRawChangeAddressTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getrawchangeaddress'
        ];

        $this->assertEquals($expected, (new GetRawChangeAddress)->jsonSerialize());
    }
}
