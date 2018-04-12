<?php

namespace ZenCash\Rpc;

final class Rpc
{
    private $address;
    private $user;
    private $password;

    public function __construct(string $address, string $user, string $password)
    {
        $this->address = $address;
        $this->user = $user;
        $this->password = $password;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
