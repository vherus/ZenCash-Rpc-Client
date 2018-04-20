<?php

namespace ZenCash\Rpc\Command\Wallet;

use PHPUnit\Framework\TestCase;
use ZenCash\Rpc\Command\Wallet\ZSendMany\Amount;

class ZSendManyTest extends TestCase
{
    public function test_serialize_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'z_sendmany',
            'params' => ['myaddress', [new Amount('myaddr', 0.2, null)], 1, 0.0001]
        ];

        $this->assertEquals($expected, (new ZSendMany('myaddress', [new Amount('myaddr', 0.2, null)]))->jsonSerialize());
    }

    public function test_expected_json_string_constructed()
    {
        $this->assertEquals(
            '{"jsonrpc":"1.0","id":"curl","method":"z_sendmany","params":["myaddress",[{"address":"myaddr","amount":0.2,"memo":"mymemo"}],1,0.0001]}',
            json_encode(new ZSendMany('myaddress', [new Amount('myaddr', 0.2, 'mymemo')]))
        );
    }
}
