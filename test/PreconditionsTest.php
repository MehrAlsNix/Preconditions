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

namespace MehrAlsNix\PreconditionsTest;

use PHPUnit_Framework_TestCase as TestCase;

/**
 * Class PreconditionsTest
 * @package MehrAlsNix\PreconditionsTest
 */
class PreconditionsTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function checkArgument()
    {
        checkArgument(false);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument did not matched.
     */
    public function checkArgumentWithErrorMessageSet()
    {
        checkArgument(false, 'Argument did not matched.');
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument foo::bar
     */
    public function checkArgumentWithErrorMessageTemplateSubstitution()
    {
        checkArgument(false, 'Argument %s::%s', 'foo', 'bar');
    }
    /**
     * @test
     * @expectedException \MehrAlsNix\Preconditions\Exception\IllegalStateException
     */
    public function checkState()
    {
        checkState(false);
    }

    /**
     * @test
     * @expectedException \MehrAlsNix\Preconditions\Exception\IllegalStateException
     * @expectedExceptionMessage This object has a wrong state.
     */
    public function checkStateWithErrorMessageSet()
    {
        checkState(false, 'This object has a wrong state.');
    }

    /**
     * @test
     * @expectedException \MehrAlsNix\Preconditions\Exception\IllegalStateException
     * @expectedExceptionMessage State foo::bar is wrong.
     */
    public function checkStateWithErrorMessageTemplateSubstitution()
    {
        checkState(false, 'State %s::%s is wrong.', 'foo', 'bar');
    }

    /**
     * @test
     * @expectedException \UnexpectedValueException
     */
    public function checkValue()
    {
        checkValue(false);
    }

    /**
     * @test
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Value did not matched.
     */
    public function checkValueWithErrorMessageSet()
    {
        checkValue(false, 'Value did not matched.');
    }

    /**
     * @test
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Value is not one of foo, bar or baz
     */
    public function checkValueWithErrorMessageTemplateSubstitution()
    {
        checkValue(false, 'Value is not one of %s, %s or %s', 'foo', 'bar', 'baz');
    }

    /**
     * @test
     * @expectedException \MehrAlsNix\Preconditions\Exception\NullPointerException
     * @expectedExceptionMessage Argument 'test' must not be null
     */
    public function checkArgNotNull()
    {
        checkArgNotNull(null, 'test');
    }

    /**
     * @test
     * @expectedException \MehrAlsNix\Preconditions\Exception\NullPointerException
     * @expectedExceptionMessage test
     */
    public function checkNotNull()
    {
        checkNotNull(null, 'test');
    }
}
