<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use PHPUnit\Framework\TestCase;

class SendRawTransactionTest extends TestCase
{
    public function test_serialize_with_default_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'sendrawtransaction',
            'params' => ['myhexstring', false]
        ];

        $this->assertEquals($expected, (new SendRawTransaction('myhexstring'))->jsonSerialize());
    }

    public function test_serialize_with_explicit_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'sendrawtransaction',
            'params' => ['myhexstring', true]
        ];

        $this->assertEquals($expected, (new SendRawTransaction('myhexstring', true))->jsonSerialize());
    }
}
