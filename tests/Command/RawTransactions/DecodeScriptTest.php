<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use PHPUnit\Framework\TestCase;

class DecodeScriptTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'decodescript',
            'params' => ['myhexstring']
        ];

        $this->assertEquals($expected, (new DecodeScript('myhexstring'))->jsonSerialize());
    }
}
