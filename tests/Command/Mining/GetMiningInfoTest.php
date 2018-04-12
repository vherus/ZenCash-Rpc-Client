<?php

namespace ZenCash\Rpc\Command\Mining;

use PHPUnit\Framework\TestCase;

class GetMiningInfoTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getmininginfo'
        ];

        $this->assertEquals($expected, (new GetMiningInfo)->jsonSerialize());
    }
}
