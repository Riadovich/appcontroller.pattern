<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 03.10.2017
 * Time: 15:35
 */

class Controller
{
    private $app_controller;

    private function __construct()
    {}

    public static function run()
    {
        $instance = new Controller();
        $instance->init();
        $instance->handleRequest();
    }

    public function init()
    {
        $request = ApllicationrEgistry::getRequest();//объект
        $app_c = ApplicationRegistry::appController();

        while ($cmd = $app_c->getCommand($request)){
            $cmd->execute();
        }
    }

    public function handleRequest()
    {
        $request = ApllicationrEgistry::getRequest();//объект
        $app_c = ApplicationRegistry::appController();

        while ($cmd = $app_c->getCommand($request)){
            $cmd->execute();
        }
        $this->invokeView($app_c->getView($request));
    }

    public function invokeView($target)
    {
        include $target;
        exit;
    }
}