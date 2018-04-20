<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class ZGetOperationStatusTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_getoperationstatus',
            'params' => [['id1', 'id2']]
        ];

        $this->assertEquals($expected, (new ZGetOperationStatus(['id1', 'id2']))->jsonSerialize());
    }
}
