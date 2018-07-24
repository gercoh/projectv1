<?php

namespace administration\controllers;

use administration\Controller;
use administration\helpers\Flash;
use administration\models\parts\Education;
use application\models\CvDataFactory;

/**
 * Class EducationController
 * @package administration\controllers
 */
class EducationController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        return $this->getView()->render('parts/education', [
            'active' => 'education',
            'title' => 'My education',
            'parts' => new CvDataFactory()
        ]);
    }

    /**
     * @param array $parameters (item "id" is required)
     */
    public function actionUpdate(array $parameters)
    {
        if (!isset($parameters['id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/education');
        }

        $result = (new Education())->updateEducation($parameters['id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Education was updated' : 'Education was not updated';
        Flash::set($status, $message);

        $this->redirect('/education');
    }

    public function actionAdd()
    {
        $result = (new Education())->createEducation($_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Education was created' : 'Education was not created';
        Flash::set($status, $message);

        $this->redirect('/education');
    }

    /**
     * @param array $parameters
     */
    public function actionDelete(array $parameters)
    {
        if (!isset($parameters['id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/education');
        }

        $result = (new Education())->deleteEducation($parameters['id']);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Education was deleted' : 'Education was not deleted';
        Flash::set($status, $message);

        $this->redirect('/education');
    }
}
