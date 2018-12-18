<?php
/**
 * @access protected
 * @author Judzhin Miles <>
 */
namespace MSBios\Content\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package MSBios\Content\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return parent::indexAction()->setVariables([
            'permalink' => $this->params()->fromRoute('permalink')
        ]);
    }
}
