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
     * Ensures that an object reference passed as a parameter to the calling
     * method is not null.
     *
     * @param object $reference an object reference
     * @param string $errorMessage the exception message to use if the check fails; will
     *                             be converted to a string using {@link String#valueOf(Object)}
     * @return mixed the non-null reference that was validated
     *
     * @throws Exception\NullPointerException if {`$reference`} is null
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
     * @throws Exception\NullPointerException
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
     * @param int $index    a user-supplied index identifying an element of an array, list
     *                      or string
     * @param int $size     the size of that array, list or string
     * @param string $desc  the text to use to describe this index in an error message
     *
     * @return int the value of `$index`
     *
     * @throws Exception\IndexOutOfBoundsException if `$index` is negative or is not
     *                                   less than `$size`
     * @throws \InvalidArgumentException  if `$size` is negative
     */
    public static function checkElementIndex($index, $size, $desc = 'index')
    {
        // Carefully optimized for execution by hotspot (explanatory comment above)
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
}
