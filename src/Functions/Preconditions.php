<?php

use MehrAlsNix\Preconditions\PreconditionUtil;

if (!function_exists('checkArgument')) {
    /**
     * @param boolean $expression
     * @param string $errorMessage
     * @param ...$errorMessageArgs
     */
    function checkArgument($expression, $errorMessage = '', ...$errorMessageArgs)
    {
        PreconditionUtil::checkArgument($expression, $errorMessage, ...$errorMessageArgs);
    }
}

if (!function_exists('checkValue')) {
    /**
     * Ensures the truth of an expression involving one or more parameters to the calling method.
     * This method will throw an \UnexpectedValueException in case of an false expression result.
     *
     * @param boolean $expression
     * @param string $errorMessage
     * @param ...$errorMessageArgs
     *
     * @throws \UnexpectedValueException
     */
    function checkValue($expression, $errorMessage = '', ...$errorMessageArgs)
    {
        PreconditionUtil::checkValue($expression, $errorMessage, ...$errorMessageArgs);
    }
}

if (!function_exists('checkArgNotNull')) {
    function checkArgNotNull($reference, $parameterName = '')
    {
        PreconditionUtil::checkArgNotNull($reference, $parameterName);
    }
}

if (!function_exists('checkNotNull')) {
    function checkNotNull($reference, $parameterName = '')
    {
        PreconditionUtil::checkNotNull($reference, $parameterName);
    }
}

