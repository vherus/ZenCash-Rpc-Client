<?php

namespace ZenCash\Rpc\Command\Util;

use PHPUnit\Framework\TestCase;

class ZValidateAddressTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_validateaddress',
            'params' => ['testaddress']
        ];

        $this->assertEquals($expected, (new ZValidateAddress('testaddress'))->jsonSerialize());
    }
}
