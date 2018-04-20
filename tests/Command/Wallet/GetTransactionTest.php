<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class GetTransactionTest extends TestCase
{
    public function test_serialize_with_default_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'gettransaction',
            'params' => ['myid', false]
        ];

        $this->assertEquals($expected, (new GetTransaction('myid'))->jsonSerialize());
    }

    public function test_serialize_with_watchOnly_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'gettransaction',
            'params' => ['myid', true]
        ];

        $this->assertEquals($expected, (new GetTransaction('myid', true))->jsonSerialize());
    }
}
