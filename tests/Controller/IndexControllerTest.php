<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBiosTest\Content\Controller;

use MSBios\Content\Controller\IndexController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Class IndexControllerTest
 * @package MSBiosTest\Content\Controller
 */
class IndexControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * @return $this|void
     */
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();

        return $this;
    }

    /**
     * @return $this
     * @throws \Exception
     */
    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/some-link.html', Request::METHOD_GET);
        $this->assertResponseStatusCode(Response::STATUS_CODE_200);
        $this->assertModuleName('MSBios');
        $this->assertControllerName(IndexController::class);
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('home/static');

        return $this;
    }

    /**
     * @return $this
     * @throws \Exception
     */
    public function testInvalidRouteDoesNotCrash()
    {
        $this->dispatch('/!!!!!.html', Request::METHOD_GET);
        $this->assertResponseStatusCode(Response::STATUS_CODE_404);
        return $this;
    }
}
