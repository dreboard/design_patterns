<?php
namespace Design_Patterns\FrontController;

/**
 * Interface FrontControllerInterface
 * @package Design_Patterns\FrontController
 */
interface FrontControllerInterface
{
    /**
     * @param $controller
     * @return mixed
     */
    public function setController($controller);

    /**
     * @param $action
     * @return mixed
     */
    public function setAction($action);

    /**
     * @param array $params
     * @return mixed
     */
    public function setParams(array $params);

    /**
     * @return mixed
     */
    public function run();
}