<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZCRawKeyGenTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'zcrawkeygen'
        ];

        $this->assertEquals($expected, (new ZCRawKeyGen)->jsonSerialize());
    }
}
