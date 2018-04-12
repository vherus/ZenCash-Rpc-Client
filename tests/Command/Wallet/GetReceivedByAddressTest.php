<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class GetReceivedByAddressTest extends TestCase
{
    public function test_serialize_constructs_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getreceivedbyaddress',
            'params' => (object) ['testaddress', 1]
        ];

        $this->assertEquals($expected, (new GetReceivedByAddress('testaddress'))->jsonSerialize());
    }
}
