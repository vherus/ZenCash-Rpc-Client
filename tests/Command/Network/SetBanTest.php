<?php

namespace ZenCash\Rpc\Command\Network;

use PHPUnit\Framework\TestCase;
use ZenCash\Rpc\Command\Network\SetBan\Command;

class SetBanTest extends TestCase
{
    public function test_serialize_with_minimal_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'setban',
            'params' => ['192.168.0.6:8233', 'remove']
        ];

        $this->assertEquals($expected, (new SetBan('192.168.0.6:8233', Command::REMOVE(), null, null))->jsonSerialize());
    }

    public function test_serialize_with_all_params_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'setban',
            'params' => ['192.168.0.6:8233', 'remove', 8574, false]
        ];

        $this->assertEquals($expected, (new SetBan('192.168.0.6:8233', Command::REMOVE(), 8574, false))->jsonSerialize());
    }

    public function test_serialize_with_bantime_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'setban',
            'params' => ['192.168.0.6:8233', 'remove', 8574]
        ];

        $this->assertEquals($expected, (new SetBan('192.168.0.6:8233', Command::REMOVE(), 8574, null))->jsonSerialize());
    }

    public function test_serialize_with_absolute_param_but_no_bantime_param_returns_expected_object()
    {
        $expected = (object) [
            'jsonrpc' => '1.0',
            'id'      => 'curl',
            'method'  => 'setban',
            'params' => ['192.168.0.6:8233', 'remove']
        ];

        $this->assertEquals($expected, (new SetBan('192.168.0.6:8233', Command::REMOVE(), null, false))->jsonSerialize());
    }
}
