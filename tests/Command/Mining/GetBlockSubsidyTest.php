<?php

namespace ZenCash\Rpc\Command\Mining;

use PHPUnit\Framework\TestCase;

class GetBlockSubsidyTest extends TestCase
{
    public function test_serialize_without_height_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getblocksubsidy',
            'params' => [20]
        ];

        $this->assertEquals($expected, (new GetBlockSubsidy(20))->jsonSerialize());
    }

    public function test_serialize_with_height_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getblocksubsidy'
        ];

        $this->assertEquals($expected, (new GetBlockSubsidy(null))->jsonSerialize());
    }
}
