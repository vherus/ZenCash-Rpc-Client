<?php

namespace ZenCash\Rpc\Command\Util;

use PHPUnit\Framework\TestCase;

class ValidateAddressTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'validateaddress',
            'params' => ['testaddress']
        ];

        $this->assertEquals($expected, (new ValidateAddress('testaddress'))->jsonSerialize());
    }
}
