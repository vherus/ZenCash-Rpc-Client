<?php

namespace ZenCash\Rpc\Command\Mining;

use ZenCash\Rpc\Command;
use ZenCash\Rpc\Validation\Exception\JsonFormatException;
use ZenCash\Rpc\Validation\Mining\GetBlockTemplateValidator;

final class GetBlockTemplate implements Command
{
    private const METHOD = 'getblocktemplate';
    private $json;

    /** @throws JsonFormatException */
    public function __construct(?string $json)
    {
        if (!is_null($json)) {
            GetBlockTemplateValidator::validate($json);
        }

        $this->json = $json;
    }

    public function jsonSerialize(): object
    {
        return (object) array_merge([
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ], !is_null($this->json) ? [
            'params' => [
                $this->json
            ]
        ] : []);
    }
}
