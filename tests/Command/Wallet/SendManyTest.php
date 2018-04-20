<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;

class SendManyTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'sendmany',
            'params' => [
                '',
                [new Amount('addr1', 1.29), new Amount('addr2', 2.83)],
                3,
                'my comment',
                ['addr1', 'addr2']
            ]
        ];

        $this->assertEquals($expected, (new SendMany(
            [new Amount('addr1', 1.29), new Amount('addr2', 2.83)],
            3,
            'my comment',
            ['addr1', 'addr2']
        ))->jsonSerialize());
    }

    public function test_expected_json_string_is_created()
    {
        $this->assertEquals('{"jsonrpc":"1.0","id":"curl","method":"sendmany","params":["",[{"addr1":1.29},{"addr2":2.83}],3,"my comment",["addr1","addr2"]]}', json_encode(new SendMany(
            [new Amount('addr1', 1.29), new Amount('addr2', 2.83)],
            3,
            'my comment',
            ['addr1', 'addr2']
        )));
    }
}
