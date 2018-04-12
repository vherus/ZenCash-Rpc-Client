<?php

namespace ZenCash\Rpc\Command\Network;

use PHPUnit\Framework\TestCase;

class GetConnectionCountTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getconnectioncount'
        ];

        $this->assertEquals($expected, (new GetConnectionCount)->jsonSerialize());
    }
}
