<?php

namespace ZenCash\Rpc\Command\Network;

use PHPUnit\Framework\TestCase;

class GetAddedNodeInfoTest extends TestCase
{
    public function test_serialize_without_node_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getaddednodeinfo',
            'params' => [false]
        ];

        $this->assertEquals($expected, (new GetAddedNodeInfo(false, null))->jsonSerialize());
    }

    public function test_serialize_with_node_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getaddednodeinfo',
            'params' => [false, '192.168.0.6:8233']
        ];

        $this->assertEquals($expected, (new GetAddedNodeInfo(false, '192.168.0.6:8233'))->jsonSerialize());
    }
}
