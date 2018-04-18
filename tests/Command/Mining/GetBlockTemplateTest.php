<?php

namespace ZenCash\Rpc\Command\Mining;

use PHPUnit\Framework\TestCase;

class GetBlockTemplateTest extends TestCase
{
    public function test_serialize_without_json_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getblocktemplate'
        ];

        $this->assertEquals($expected, (new GetBlockTemplate(null))->jsonSerialize());
    }

    public function test_serialize_with_json_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'getblocktemplate',
            'params' => ['{"mode":"template"}']
        ];

        $this->assertEquals($expected, (new GetBlockTemplate('{"mode":"template"}'))->jsonSerialize());
    }
}
