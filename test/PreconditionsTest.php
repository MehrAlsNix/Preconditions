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

use MehrAlsNix\Preconditions\Preconditions;
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
        Preconditions::checkArgument(false);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument did not matched.
     */
    public function checkArgumentWithErrorMessageSet()
    {
        Preconditions::checkArgument(false, 'Argument did not matched.');
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument foo::bar
     */
    public function checkArgumentWithErrorMessageTemplateSubstitution()
    {
        Preconditions::checkArgument(false, 'Argument %s::%s', 'foo', 'bar');
    }

    /**
     * @test
     * @expectedException \MehrAlsNix\Preconditions\Exception\NullPointerException
     * @expectedExceptionMessage Argument 'test' must not be null
     */
    public function checkArgNotNull()
    {
        Preconditions::checkArgNotNull(null, 'test');
    }
}
