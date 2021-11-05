<?php

declare(strict_types=1);

namespace Shared\Exceptions;

use Exception;
use Throwable;

class ObjectNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message . ' not found', 404, $previous);
    }
}
