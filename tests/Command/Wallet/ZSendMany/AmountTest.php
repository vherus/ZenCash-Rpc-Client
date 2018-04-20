<?php

namespace ZenCash\Rpc\Command\Wallet\ZSendMany;

use PHPUnit\Framework\TestCase;

class AmountTest extends TestCase
{
    public function test_serialise_returns_expected_object()
    {
        $this->assertEquals((object) ['address' => 'myaddress', 'amount' => 1.23, 'memo' => 'my memo'], (new Amount('myaddress', 1.23, 'my memo'))->jsonSerialize());
    }
}
