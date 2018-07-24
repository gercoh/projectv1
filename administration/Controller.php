<?php

namespace administration;

use administration\models\User;
use common\Config;
use common\Template;

/**
 * Class Controller
 * @package administration
 */
class Controller extends \common\Controller
{
    /**
     * @return Template|null
     */
    public function getView()
    {
        $this->view = new Template();
        $this->view->setTemplatesDirectory(Config::getInstance()->get('adminTemplatesPath'));

        $user = new User();
        if ($user->isGuest() && false === $user->isAuthRequest()) {
            echo $this->view->setLayout('layouts/empty')->render('index/login', ['title' => 'Log in']);
            exit;
        }

        return $this->view->setLayout('layouts/main');
    }
}
