<?php

namespace ZenCash\Rpc\Command\Network;

use PHPUnit\Framework\TestCase;

class DisconnectNodeTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'disconnectnode',
            'params' => ['192.168.0.6:8233']
        ];

        $this->assertEquals($expected, (new DisconnectNode('192.168.0.6:8233'))->jsonSerialize());
    }
}
