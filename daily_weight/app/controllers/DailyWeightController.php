<?php

/**
 * Created by PhpStorm.
 * User: arifbudiman
 * Date: 9/9/17
 * Time: 6:48 PM
 */

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class DailyWeightController extends Controller
{
    public $model;
    const REDIS_HASH = 'daily_weight';

    public function indexAction()
    {
        $this->model = new DailyWeightModel();
        $this->view->data = $this->model->getAllWeight(self::REDIS_HASH);
    }

    public function showAction($date)
    {
        $this->view->title = 'Show';
        $this->model = new DailyWeightModel();
        $this->view->data = $this->model->getWeightByDate(self::REDIS_HASH, $date, true);
    }

    public function addAction()
    {
        $this->view->title = 'Add Weight';
    }

    public function editAction($date)
    {
        $this->view->title = 'Edit Weight';

        $this->model = new DailyWeightModel();
        $this->view->data = $this->model->getWeightByDate(self::REDIS_HASH, $date, true);
    }

    public function saveAction()
    {
        $request = new Request();
        $data['date'] = $request->getPost('date');
        $data['max'] = $request->getPost('max');
        $data['min'] = $request->getPost('min');

        $this->model = new DailyWeightModel();
        $this->model->setWeight(self::REDIS_HASH, $data['date'], json_encode($data));

        $this->response->redirect('/dailyweight', TRUE);
    }

    public function deleteAction($date)
    {
        $this->model = new DailyWeightModel();
        $this->model->deleteWeight(self::REDIS_HASH, $date);

        $this->response->redirect('/dailyweight', TRUE);
    }
}