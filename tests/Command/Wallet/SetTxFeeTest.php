<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class SetTxFeeTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'settxfee',
            'params' => [1.298]
        ];

        $this->assertEquals($expected, (new SetTxFee(1.298))->jsonSerialize());
    }
}
