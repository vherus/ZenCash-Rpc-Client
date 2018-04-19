<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use PHPUnit\Framework\TestCase;
use ZenCash\Rpc\Command\RawTransactions\SignRawTransaction\SigHashType;

class SignRawTransactionTest extends TestCase
{
    public function test_serialize_with_minimal_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'signrawtransaction',
            'params' => ['myhexstring']
        ];

        $this->assertEquals($expected, (new SignRawTransaction('myhexstring', [], [], null))->jsonSerialize());
    }

    public function test_serialize_with_transactions_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'signrawtransaction',
            'params' => [
                'myhexstring',
                [
                    new RawTransaction('myid1', 0, 'mypubkey1', 'myscript1'),
                    new RawTransaction('myid2', 1, 'mypubkey2', 'myscript2')
                ]
            ]
        ];

        $transactions = [
            new RawTransaction('myid1', 0, 'mypubkey1', 'myscript1'),
            new RawTransaction('myid2', 1, 'mypubkey2', 'myscript2')
        ];

        $this->assertEquals($expected, (new SignRawTransaction('myhexstring', $transactions, [], null))->jsonSerialize());
    }

    public function test_serialize_with_privKeys_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'signrawtransaction',
            'params' => [
                'myhexstring',
                [
                    new RawTransaction('myid1', 0, 'mypubkey1', 'myscript1'),
                    new RawTransaction('myid2', 1, 'mypubkey2', 'myscript2')
                ],
                [
                    'mykey1',
                    'mykey2'
                ],
                SigHashType::ALL()
            ]
        ];

        $transactions = [
            new RawTransaction('myid1', 0, 'mypubkey1', 'myscript1'),
            new RawTransaction('myid2', 1, 'mypubkey2', 'myscript2')
        ];

        $this->assertEquals($expected, (new SignRawTransaction('myhexstring', $transactions, ['mykey1', 'mykey2'], null))->jsonSerialize());
    }

    public function test_serialize_with_max_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'signrawtransaction',
            'params' => [
                'myhexstring',
                [
                    new RawTransaction('myid1', 0, 'mypubkey1', 'myscript1'),
                    new RawTransaction('myid2', 1, 'mypubkey2', 'myscript2')
                ],
                [
                    'mykey1',
                    'mykey2'
                ],
                SigHashType::SINGLE_ANYONECANPAY()
            ]
        ];

        $transactions = [
            new RawTransaction('myid1', 0, 'mypubkey1', 'myscript1'),
            new RawTransaction('myid2', 1, 'mypubkey2', 'myscript2')
        ];

        $this->assertEquals($expected, (new SignRawTransaction('myhexstring', $transactions, ['mykey1', 'mykey2'], SigHashType::SINGLE_ANYONECANPAY()))->jsonSerialize());
    }
}
