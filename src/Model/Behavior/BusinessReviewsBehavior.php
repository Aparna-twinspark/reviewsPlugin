<?php
namespace Integrateideas\Reviews\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Controller\Controller;

/**
 * Users behavior
 */
class BusinessReviewsBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
    								'businessReviewAssociatedModel' => null, 
    								'businessReviewForeignKey' => null
    							];

     public function initialize(array $config)
    {
    	$controller = new Controller();
    	$this->Model = $controller->loadModel($this->_config['businessReviewAssociatedModel']);
    }
}
