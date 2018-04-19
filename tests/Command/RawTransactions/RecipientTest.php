<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use PHPUnit\Framework\TestCase;

class RecipientTest extends TestCase
{
    public function test_serialise_constructs_expected_object()
    {
        $expected = (object) [
            'myaddress' => 2.485
        ];

        $this->assertEquals($expected, (new Recipient('myaddress', 2.485))->jsonSerialize());
    }
}
