<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use PHPUnit\Framework\TestCase;

class FundRawTransactionTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'fundrawtransaction',
            'params' => ['myhexstring']
        ];

        $this->assertEquals($expected, (new FundRawTransaction('myhexstring'))->jsonSerialize());
    }
}
