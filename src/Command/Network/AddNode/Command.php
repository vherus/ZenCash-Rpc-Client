<?php

namespace ZenCash\Rpc\Command\Network\AddNode;

use MyCLabs\Enum\Enum;

/**
 * @method static Command ADD()
 *  Adds a node to the list
 *
 * @method static Command REMOVE()
 *  Removes a node from the list
 *
 * @method static Command ONE_TRY()
 *  Try a connection to the node once
 */
final class Command extends Enum
{
    private const ADD = 'add';
    private const REMOVE = 'remove';
    private const ONE_TRY = 'onetry';
}
