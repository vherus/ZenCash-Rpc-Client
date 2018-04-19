<?php

namespace ZenCash\Rpc\Command\Network\SetBan;

use MyCLabs\Enum\Enum;

/**
 * @method static Command ADD()
 *  Adds a node to the list
 *
 * @method static Command REMOVE()
 *  Removes a node from the list
 */
final class Command extends Enum
{
    private const ADD = 'add';
    private const REMOVE = 'remove';
}
