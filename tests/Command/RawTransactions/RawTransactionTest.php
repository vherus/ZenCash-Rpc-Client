<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use PHPUnit\Framework\TestCase;

class RawTransactionTest extends TestCase
{
    public function test_serialise_with_minimal_params_returns_expected_object()
    {
        $this->assertEquals(
            (object) ['txid' => 'testid', 'vout' => 27],
            (new RawTransaction('testid', 27, null, null))->jsonSerialize());
    }

    public function test_serialise_with_pubkey_param_returns_expected_object()
    {
        $this->assertEquals(
            (object) ['txid' => 'testid', 'vout' => 27, 'scriptPubKey' => 'test pubkey'],
            (new RawTransaction('testid', 27, 'test pubkey', null))->jsonSerialize());
    }

    public function test_serialise_with_redeemScript_param_returns_expected_object()
    {
        $this->assertEquals(
            (object) ['txid' => 'testid', 'vout' => 27, 'redeemScript' => 'test script'],
            (new RawTransaction('testid', 27, null, 'test script'))->jsonSerialize());
    }

    public function test_serialise_with_max_params_returns_expected_object()
    {
        $this->assertEquals(
            (object) ['txid' => 'testid', 'vout' => 27, 'scriptPubKey' => 'test pubkey', 'redeemScript' => 'test script'],
            (new RawTransaction('testid', 27, 'test pubkey', 'test script'))->jsonSerialize());
    }
}
