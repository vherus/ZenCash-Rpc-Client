<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use PHPUnit\Framework\TestCase;

class GetRawTransactionTest extends TestCase
{
    public function test_serialize_with_default_verbosity_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getrawtransaction',
            'params' => ['mytransactionid', 0]
        ];

        $this->assertEquals($expected, (new GetRawTransaction('mytransactionid'))->jsonSerialize());
    }

    public function test_serialize_with_explicit_verbosity_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getrawtransaction',
            'params' => ['mytransactionid', 1]
        ];

        $this->assertEquals($expected, (new GetRawTransaction('mytransactionid', 1))->jsonSerialize());
    }
}
