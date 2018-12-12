<?php
/**
 * @access protected
 * @author Judzhin Miles <>
 */
namespace MSBios\Content\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class IndexController
 * @package MSBios\Content\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        /** @var string $permalink */
        $permalink = $this->params()->fromRoute('permalink'); die();
        return parent::indexAction();
    }

}