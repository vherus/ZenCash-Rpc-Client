<?php

namespace ZenCash\Rpc\Command\Util;

use PHPUnit\Framework\TestCase;

class CreateMultiSigTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'createmultisig',
            'params' => [3, ['key1', 'key2']]
        ];

        $this->assertEquals($expected, (new CreateMultiSig(3, ['key1', 'key2']))->jsonSerialize());
    }

    public function test_providing_no_keys_throws_exception()
    {
        $this->expectException(\InvalidArgumentException::class);
        new CreateMultiSig(2, []);
    }
}
