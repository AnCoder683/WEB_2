<?php
    namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

    class AuthController extends Controller 
    {
        public function login()
        {
            $this->setLayout('auth');
            return $this->render('login');
        }

        public function register(Request $request)
        {
            $registerModel = new RegisterModel();
            $errors = [];
            if($request->isPost()) {
                $registerModel->loadData($request->getBody());
                echo "this is register";
                echo '<pre>';
                var_dump($registerModel);
                echo '</pre>';
                if($registerModel->validate() && $registerModel->register()) {
                    return 'Success';
                }
                return $this->render('register', [
                    'model' => $registerModel
                ]);
            }
            $this->setLayout('auth');
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
    }
?>