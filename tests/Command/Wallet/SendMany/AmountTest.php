<?php

namespace ZenCash\Rpc\Command\Wallet\SendMany;

use PHPUnit\Framework\TestCase;

class AmountTest extends TestCase
{
    public function test_serialise_returns_expected_object()
    {
        $this->assertEquals((object) ['myaddress' => 1.23], (new Amount('myaddress', 1.23))->jsonSerialize());
    }
}
