<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\engine\Session;
use app\interfaces\IRenderer;
use app\models\entities\Order;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;

class AdminOrderController extends Controller
{

    public function actionIndex(){
        $order = App::call()->orderRepository->getAll();


        $session = new Session();
        $login = $session->get('login');
        $isAdmin = false;
        if(!empty($login)){
            $isAdmin = App::call()->usersRepository->isAdmin($login);
        }

        echo $this->render('order/index', [
            'order' => $order,
            'isAdmin' => $isAdmin
        ]);
    }

    public function actionOrder(){

        $session = new Session();
        $login = $session->get('login');
        if(empty($login) || App::call()->usersRepository->isAdmin($login) == false){
            echo "You can't see order details";die;
        }

        $id = (new Request())->getParams()['id'];

        $order = App::call()->orderRepository->getOne($id);
        $summ = null;
        $basket = App::call()->basketRepository->getBasket($order->session_id);
        foreach($basket as $item){
            $summ += $item['price'];
        }
        echo $this->render('order/order', [
            'order' => $order,
            'basket' => $basket,
            'summ' => $summ
        ]);
    }

}