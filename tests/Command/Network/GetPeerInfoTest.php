<?php

namespace ZenCash\Rpc\Command\Network;

use PHPUnit\Framework\TestCase;

class GetPeerInfoTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getpeerinfo'
        ];

        $this->assertEquals($expected, (new GetPeerInfo)->jsonSerialize());
    }
}
