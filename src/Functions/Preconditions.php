<?php
/**
 * Preconditions
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @copyright 2015 MehrAlsNix (http://www.mehralsnix.de)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://github.com/MehrAlsNix/Preconditions
 */

use MehrAlsNix\Preconditions\PreconditionUtil;

if (!function_exists('checkArgument')) {
    /**
     * Ensures the truth of an expression involving one or more parameters to the
     * calling method.
     *
     * This method will throw an `\InvalidArgumentException` in case of an `false`
     * expression result.
     *
     * @param boolean $expression
     * @param string $errorMessage
     * @param ...$errorMessageArgs
     *
     * @throws \InvalidArgumentException
     */
    function checkArgument($expression, $errorMessage = '', ...$errorMessageArgs)
    {
        PreconditionUtil::checkArgument($expression, $errorMessage, ...$errorMessageArgs);
    }
}

if (!function_exists('checkState')) {
    /**
     * Ensures the truth of an expression involving the state of the calling
     * instance, but not involving any parameters to the calling method.
     *
     * This method will throw an `\InvalidArgumentException` in case of an `false`
     * expression result.
     *
     * @param boolean $expression
     * @param string $errorMessage
     * @param ...$errorMessageArgs
     *
     * @throws IllegalStateException
     */
    function checkState($expression, $errorMessage = '', ...$errorMessageArgs)
    {
        PreconditionUtil::checkState($expression, $errorMessage, ...$errorMessageArgs);
    }
}

if (!function_exists('checkNotNull')) {
    /**
     * Ensures that an object reference passed as a parameter to the calling
     * method is not null.
     *
     * @param object $reference an object reference
     * @param string $errorMessage the exception message to use if the check fails; will
     *                             be converted to a string using {@link String#valueOf(Object)}
     * @param ...$errorMessageArgs
     *
     * @return mixed the non-null reference that was validated
     *
     * @throws \MehrAlsNix\Preconditions\Exception\NullPointerException
     */
    function checkNotNull($reference, $errorMessage = '', ...$errorMessageArgs)
    {
        PreconditionUtil::checkNotNull($reference, $errorMessage, ...$errorMessageArgs);
    }
}

if (!function_exists('checkArgNotNull')) {
    /**
     * Ensures that an object reference passed as a parameter to the calling
     * method is not null.
     *
     * @param object $reference
     * @param string $parameterName
     *
     * @return object
     *
     * @throws \MehrAlsNix\Preconditions\Exception\NullPointerException
     */
    function checkArgNotNull($reference, $parameterName)
    {
        PreconditionUtil::checkArgNotNull($reference, $parameterName);
    }
}

if (!function_exists('checkValue')) {
    /**
     * Ensures the truth of an expression involving one or more parameters to the
     * calling method.
     *
     * This method will throw an `\UnexpectedValueException` in case of an `false`
     * expression result.
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

if (!function_exists('checkElementIndex')) {
    /**
     * Ensures that `$index` specifies a valid <i>element</i> in an array,
     * list or string of size `$size`. An element index may range from zero,
     * inclusive, to `$size`, exclusive.
     *
     * @param int $index a user-supplied index identifying an element of an array, list
     *                      or string
     * @param int $size the size of that array, list or string
     * @param string $desc the text to use to describe this index in an error message
     *
     * @return int the value of `$index`
     *
     * @throws \MehrAlsNix\Preconditions\Exception\IndexOutOfBoundsException if `$index` is negative or is not
     *                                   less than `$size`
     * @throws \InvalidArgumentException  if `$size` is negative
     */
    function checkElementIndex($index, $size, $desc = 'index')
    {
        PreconditionUtil::checkElementIndex($index, $size, $desc);
    }
}

if (!function_exists('checkPositionIndex')) {
    /**
     * Ensures that `$index` specifies a valid <i>position</i> in an array,
     * list or string of size `$size`. A position index may range from zero
     * to `$size`, inclusive.
     *
     * @param int $index a user-supplied index identifying a position in an array, list
     *              or string
     * @param int $size the size of that array, list or string
     * @param string $desc the text to use to describe this index in an error message
     * @return int the value of `$index`
     * @throws \MehrAlsNix\Preconditions\Exception\IndexOutOfBoundsException if `$index` is negative or is
     *                                   greater than `$size`
     * @throws \InvalidArgumentException  if `$size` is negative
     */
    function checkPositionIndex($index, $size, $desc)
    {
        PreconditionUtil::checkPositionIndex($index, $size, $desc);
    }
}

if (!function_exists('checkPositionIndexes')) {
    /**
     * Ensures that `$start` and `$end` specify a valid <i>positions</i>
     * in an array, list or string of size `$size`, and are in order. A
     * position index may range from zero to `$size`, inclusive.
     *
     * @param int $start a user-supplied index identifying a starting position in an
     *              array, list or string
     * @param int $end a user-supplied index identifying a ending position in an array,
     *              list or string
     * @param int $size the size of that array, list or string
     * @throws \MehrAlsNix\Preconditions\Exception\IndexOutOfBoundsException if either index is negative or is
     *                                   greater than `$size`, or if `$end` is less than `$start`
     * @throws \InvalidArgumentException  if `$size` is negative
     */
    function checkPositionIndexes($start, $end, $size)
    {
        PreconditionUtil::checkPositionIndexes($start, $end, $size);
    }
}
