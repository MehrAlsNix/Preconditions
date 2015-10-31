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
     * This method will return an `\InvalidArgumentException` in case of an `false`
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
}
