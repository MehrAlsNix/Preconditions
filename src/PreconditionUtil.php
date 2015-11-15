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

namespace MehrAlsNix\Preconditions;
use MehrAlsNix\Preconditions\Exception\IllegalStateException;

/**
 * Class PreconditionUtil
 * @package MehrAlsNix\PreconditionUtil
 */
final class PreconditionUtil
{
    private function __construct()
    {
        // hidden constructor.
    }

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
    public static function checkArgument($expression, $errorMessage = '', ...$errorMessageArgs)
    {
        if (!$expression) {
            throw new \InvalidArgumentException(
                vsprintf($errorMessage, $errorMessageArgs)
            );
        }
    }

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
    public static function checkState($expression, $errorMessage = '', ...$errorMessageArgs)
    {
        if (!$expression) {
            throw new IllegalStateException(
                vsprintf($errorMessage, $errorMessageArgs)
            );
        }
    }

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
    public static function checkNotNull($reference, $errorMessage = '', ...$errorMessageArgs)
    {
        if ($reference === null) {
            throw new Exception\NullPointerException(
                vsprintf($errorMessage, $errorMessageArgs)
            );
        }
        return $reference;
    }

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
    public static function checkArgNotNull($reference, $parameterName)
    {
        if ($reference === null) {
            throw new Exception\NullPointerException(
                sprintf('Argument \'%s\' must not be null', $parameterName)
            );
        }
        return $reference;
    }

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
    public static function checkValue($expression, $errorMessage = '', ...$errorMessageArgs)
    {
        if (!$expression) {
            throw new \UnexpectedValueException(
                vsprintf($errorMessage, $errorMessageArgs)
            );
        }
    }

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
    public static function checkElementIndex($index, $size, $desc = 'index')
    {
        if ($index < 0 || $index >= $size) {
            throw new Exception\IndexOutOfBoundsException(self::badElementIndex($index, $size, $desc));
        }
        return $index;
    }

    /**
     * @param int $index
     * @param int $size
     * @param string $desc
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    private static function badElementIndex($index, $size, $desc)
    {
        if ($index < 0) {
            return vsprintf('%s (%s) must not be negative', $desc, $index);
        } elseif ($size < 0) {
            throw new \InvalidArgumentException('negative size: ' . $size);
        } else { // index >= size
            return vsprintf('%s (%s) must be less than size (%s)', $desc, $index, $size);
        }
    }

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
    public static function checkPositionIndex($index, $size, $desc)
    {
        if ($index < 0 || $index > $size) {
            throw new Exception\IndexOutOfBoundsException(self::badPositionIndex($index, $size, $desc));
        }
        return $index;
    }

    /**
     * @param int $index
     * @param int $size
     * @param string $desc
     * 
     * @return string
     * 
     * @throws \InvalidArgumentException
     */
    private static function badPositionIndex($index, $size, $desc)
    {
        if ($index < 0) {
            return sprintf('%s (%s) must not be negative', $desc, $index);
        } elseif ($size < 0) {
            throw new \InvalidArgumentException('negative size: ' . $size);
        } else { // index > size
            return sprintf('%s (%s) must not be greater than size (%s)', $desc, $index, $size);
        }
    }

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
    public static function checkPositionIndexes($start, $end, $size)
    {
        if ($start < 0 || $end < $start || $end > $size) {
            throw new Exception\IndexOutOfBoundsException(self::badPositionIndexes($start, $end, $size));
        }
    }

    /**
     * @param int $start
     * @param int $end
     * @param int $size
     * 
     * @return string
     * 
     * @throws \InvalidArgumentException
     */
    private static function badPositionIndexes($start, $end, $size)
    {
        if ($start < 0 || $start > $size) {
            return self::badPositionIndex($start, $size, 'start index');
        }
        if ($end < 0 || $end > $size) {
            return self::badPositionIndex($end, $size, 'end index');
        }
        // end < start
        return sprintf('end index (%s) must not be less than start index (%s)', $end, $start);
    }
}
