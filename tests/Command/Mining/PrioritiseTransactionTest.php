<?php

namespace ZenCash\Rpc\Command\Mining;

use PHPUnit\Framework\TestCase;

class PrioritiseTransactionTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'prioritisetransaction',
            'params' => ['testid', 1.2, 1000]
        ];

        $this->assertEquals($expected, (new PrioritiseTransaction('testid', 1.2, 1000))->jsonSerialize());
    }
}
