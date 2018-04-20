<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class SendToAddressTest extends TestCase
{
    public function test_serialize_with_default_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'sendtoaddress',
            'params' => ['myaddress', 1.29]
        ];

        $this->assertEquals($expected, (new SendToAddress('myaddress', 1.29, null, null))->jsonSerialize());
    }

    public function test_serialize_with_comment_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'sendtoaddress',
            'params' => ['myaddress', 1.29, 'my comment']
        ];

        $this->assertEquals($expected, (new SendToAddress('myaddress', 1.29, 'my comment', null))->jsonSerialize());
    }

    public function test_serialize_with_commentto_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'sendtoaddress',
            'params' => ['myaddress', 1.29, 'my comment', 'my comment to']
        ];

        $this->assertEquals($expected, (new SendToAddress('myaddress', 1.29, 'my comment', 'my comment to'))->jsonSerialize());
    }

    public function test_serialize_with_subtract_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'sendtoaddress',
            'params' => ['myaddress', 1.29, 'my comment', 'my comment to', true]
        ];

        $this->assertEquals($expected, (new SendToAddress('myaddress', 1.29, 'my comment', 'my comment to', true))->jsonSerialize());
    }
}
