<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class SignMessageTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'signmessage',
            'params' => ['myaddress', 'my message']
        ];

        $this->assertEquals($expected, (new SignMessage('myaddress', 'my message'))->jsonSerialize());
    }
}
