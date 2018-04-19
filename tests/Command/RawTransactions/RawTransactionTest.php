<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use PHPUnit\Framework\TestCase;

class RawTransactionTest extends TestCase
{
    public function test_serialise_returns_expected_object()
    {
        $this->assertEquals((object) ['txid' => 'testid', 'vout' => 27], (new RawTransaction('testid', 27))->jsonSerialize());
    }
}
