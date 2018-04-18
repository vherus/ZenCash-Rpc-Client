<?php

namespace ZenCash\Rpc\Command\Mining;

use PHPUnit\Framework\TestCase;

class SubmitBlockTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'submitblock',
            'params' => ['mytestdata']
        ];

        $this->assertEquals($expected, (new SubmitBlock('mytestdata'))->jsonSerialize());
    }
}
