<?php

namespace ZenCash\Rpc\Command\Util;

use PHPUnit\Framework\TestCase;

class EstimatePriorityTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'estimatepriority',
            'params' => [6]
        ];

        $this->assertEquals($expected, (new EstimatePriority(6))->jsonSerialize());
    }
}
