<?php

namespace ZenCash\Rpc\Command\Util;

use PHPUnit\Framework\TestCase;

class VerifyMessageTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'verifymessage',
            'params' => ['myaddress', 'mysignature', 'mymessage']
        ];

        $this->assertEquals($expected, (new VerifyMessage('myaddress', 'mysignature', 'mymessage'))->jsonSerialize());
    }
}
