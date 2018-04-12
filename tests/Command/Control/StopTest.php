<?php

namespace ZenCash\Rpc\Command\Control;

use PHPUnit\Framework\TestCase;

class StopTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'stop'
        ];

        $this->assertEquals($expected, (new Stop)->jsonSerialize());
    }
}
