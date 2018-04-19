<?php

namespace ZenCash\Rpc\Command\Util;

use PHPUnit\Framework\TestCase;

class EstimateFeeTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'estimatefee',
            'params' => [6]
        ];

        $this->assertEquals($expected, (new EstimateFee(6))->jsonSerialize());
    }
}
