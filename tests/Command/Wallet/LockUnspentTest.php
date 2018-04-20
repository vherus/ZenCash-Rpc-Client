<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class LockUnspentTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'lockunspent',
            'params' => [true, [
                new Transaction('id1', 1),
                new Transaction('id2', 2),
            ]]
        ];

        $this->assertEquals($expected, (new LockUnspent(true, [new Transaction('id1', 1), new Transaction('id2', 2)]))->jsonSerialize());
    }

    public function test_serialized_object_is_expected()
    {
        $this->assertEquals(
            '{"jsonrpc":"1.0","id":"curl","method":"lockunspent","params":[true,[{"txid":"id1","vout":1},{"txid":"id2","vout":2}]]}',
            json_encode(new LockUnspent(true, [new Transaction('id1', 1), new Transaction('id2', 2)]))
        );
    }
}
