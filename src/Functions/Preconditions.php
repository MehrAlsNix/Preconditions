<?php

use MehrAlsNix\Preconditions\PreconditionUtil;

if (!function_exists('checkArgument')) {
    function checkArgument($expression, $errorMessage = '', ...$errorMessageArgs)
    {
        PreconditionUtil::checkArgument($expression, $errorMessage, ...$errorMessageArgs);
    }
}
