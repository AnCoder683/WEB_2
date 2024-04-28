<?php
    namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

    class SiteController extends Controller
    {
        public function home()
        {
            $params = [
                'name' => 'Nguyễn An Thuận'
            ];
            return $this->render('home', $params);
        }
        public function handleContact(Request $request)
        {
            $body = $request->getBody();
            echo '<pre>';
            var_dump($_GET);
            echo '</pre>';
            return 'site controller handling submitted data handleContact';
        }
        public function contact()
        {
            return $this->render('contact');
        }
    }
?>