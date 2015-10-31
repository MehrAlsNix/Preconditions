<?php

require __DIR__ . '/../vendor/autoload.php';

define('GENERATOR_BASE', __DIR__);
define('PRECONDITIONS_BASE', realpath(dirname(GENERATOR_BASE) . DIRECTORY_SEPARATOR . 'src'));

define('STATIC_MATCHERS_FILE', PRECONDITIONS_BASE . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Preconditions.php');

set_include_path(
    implode(
        PATH_SEPARATOR,
        array(
            GENERATOR_BASE,
            PRECONDITIONS_BASE,
            get_include_path()
        )
    )
);

@unlink(STATIC_MATCHERS_FILE);

$class = new \ReflectionClass('\MehrAlsNix\Preconditions\PreconditionUtil');
$methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
$line[] = <<<FILE_HEAD
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

FILE_HEAD;

foreach ($methods as $method) {
    $parameterList = implode(', ', array_map(
            function (\ReflectionParameter $p) {
                if ($p->isVariadic()) {
                    $result = sprintf('...$%s', $p->getName());
                } else {
                    $result = sprintf('$%s', $p->getName());
                }

                return $result;
            },
            $method->getParameters()
        )
    );
    $parameters = implode(
        ', ', array_map(
            function (\ReflectionParameter $p) {
                try {
                    $result = sprintf('$%s = \'%s\'', $p->getName(), $p->getDefaultValue());
                } catch (\ReflectionException $re) {
                    if ($p->isVariadic()) {
                        $result = sprintf('...$%s', $p->getName());
                    } else {
                        $result = sprintf('$%s', $p->getName());
                    }

                    return $result;
                }
                return $result;
            },
            $method->getParameters()
        )
    );
    $line[] = <<<FUNCTION_FILE
if (!function_exists('{$method->getName()}')) {
    {$method->getDocComment()}
    function {$method->getName()}({$parameters})
    {
        PreconditionUtil::{$method->getName()}({$parameterList});
    }
}

FUNCTION_FILE;
}

echo file_put_contents(STATIC_MATCHERS_FILE, implode("\n", $line)) . ' bytes written.';
