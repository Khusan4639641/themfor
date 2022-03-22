<?php
namespace App\controllers;

class statisticController extends ParentController
{
    public function statistics()
    {
        $this->middleware->check();

        echo $this->statistics->show($_POST['date']);
    }
}