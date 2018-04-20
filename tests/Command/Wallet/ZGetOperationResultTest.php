<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZGetOperationResultTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_getoperationresult',
            'params' => [['id1', 'id2']]
        ];

        $this->assertEquals($expected, (new ZGetOperationResult(['id1', 'id2']))->jsonSerialize());
    }
}
