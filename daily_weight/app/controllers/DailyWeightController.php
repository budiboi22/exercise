<?php

/**
 * Created by PhpStorm.
 * User: arifbudiman
 * Date: 9/9/17
 * Time: 6:48 PM
 */
class DailyWeightController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function showAction()
    {
        $this->view->title = 'Show';
    }

    public function addAction()
    {
        $this->view->title = 'Add Weight';
    }

    public function editAction()
    {
        $this->view->title = 'Edit Weight';
    }

    public function saveAction()
    {

    }

    public function deleteAction()
    {

    }
}