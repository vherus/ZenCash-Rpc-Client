<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class KeyPoolRefillTest extends TestCase
{
    public function test_serialize_with_default_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'keypoolrefill',
            'params' => [100]
        ];

        $this->assertEquals($expected, (new KeyPoolRefill)->jsonSerialize());
    }

    public function test_serialize_with_set_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'keypoolrefill',
            'params' => [302]
        ];

        $this->assertEquals($expected, (new KeyPoolRefill(302))->jsonSerialize());
    }
}
