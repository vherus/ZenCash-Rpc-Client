<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZListOperationIdsTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_listoperationids'
        ];

        $this->assertEquals($expected, (new ZListOperationIds)->jsonSerialize());
    }
}