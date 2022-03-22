<?php
namespace App\controllers;


use App\models\Install;
use League\Plates\Engine;

class installController
{
    /**
     * @var Install
     */
    private $install;
    /**
     * @var Engine
     */
    private $view;

    public function __construct(Install $install,Engine $view)
    {
        $this->install = $install;
        $this->view = $view;
    }

    public function install()
    {
        echo $this->view->render('install', ['url' => '', 'status' => '', 'webName' => '']);
    }
    public function installation()
    {
        $this->install->insertData($_POST);
    }
}