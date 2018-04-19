<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use PHPUnit\Framework\TestCase;

class CreateRawTransactionTest extends TestCase
{
    public function test_multiple_transactions_can_be_supplied()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'createrawtransaction',
            'params' => [
                [
                    new RawTransaction('firstid', 1),
                    new RawTransaction('secondid', 2),
                ],
                (object) [
                    'myfirstaddress' => 2.182,
                    'mysecondaddress' => 1.932
                ]
            ]
        ];

        $command = new CreateRawTransaction([
            new RawTransaction('firstid', 1),
            new RawTransaction('secondid', 2)
        ], [new Recipient('myfirstaddress', 2.182), new Recipient('mysecondaddress', 1.932)]);

        $this->assertEquals($expected, $command->jsonSerialize());
    }

    public function test_json_constructed_as_expected_when_serialising_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'createrawtransaction',
            'params' => [
                [
                    (object) ['txid' => 'firstid', 'vout' => 1],
                    (object) ['txid' => 'secondid', 'vout' => 2]
                ],
                (object) [
                    'myfirstaddress' => 2.182,
                    'mysecondaddress' => 1.932
                ]
            ]
        ];

        $command = new CreateRawTransaction([
            new RawTransaction('firstid', 1),
            new RawTransaction('secondid', 2)
        ], [new Recipient('myfirstaddress', 2.182), new Recipient('mysecondaddress', 1.932)]);

        $this->assertEquals(json_encode($expected), json_encode($command));

        $hardExpected = '{"jsonrpc":"1.0","id":"curl","method":"createrawtransaction","params":[[{"txid":"firstid","vout":1},{"txid":"secondid","vout":2}],{"myfirstaddress":2.182,"mysecondaddress":1.932}]}';
        $this->assertEquals($hardExpected, json_encode($command));
    }
}
