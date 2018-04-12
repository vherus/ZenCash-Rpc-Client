<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ListTransactionsTest extends TestCase
{
    public function test_serialize_with_default_args_constructs_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listtransactions',
            'params' => (object) [
                '*',
                10,
                0,
                false
            ]
        ];

        $this->assertEquals($expected, (new ListTransactions)->jsonSerialize());
    }

    public function test_serialize_with_args_constructs_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'listtransactions',
            'params' => (object) [
                'account1',
                27,
                3,
                true
            ]
        ];

        $this->assertEquals($expected, (new ListTransactions('account1', 27, 3, true))->jsonSerialize());
    }
}
