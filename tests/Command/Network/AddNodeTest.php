<?php

namespace ZenCash\Rpc\Command\Network;

use PHPUnit\Framework\TestCase;
use ZenCash\Rpc\Command\Network\AddNode\Command;

class AddNodeTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'addnode',
            'params' => ['192.168.0.6:8233', 'onetry']
        ];

        $this->assertEquals($expected, (new AddNode('192.168.0.6:8233', Command::ONE_TRY()))->jsonSerialize());
    }
}
