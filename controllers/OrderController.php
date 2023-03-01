<?php


namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\engine\Session;
use app\models\repositories\OrderRepository;
use app\models\entities\Order;
use app\models\repositories\UserRepository;


class OrderController extends Controller
{

    public function actionIndex()
    {

        $session_id = (new Session())->getId();

        $order = App::call()->orderRepository->getOrder($session_id);

        echo $this->render('order/index', [
            'order' => $order
        ]);

    }

    public function actionDelete()
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = (new Session())->getId();
        $order = App::call()->orderRepository->getOne($id);
        $error = "ok";
        if ($session_id == $order->session_id) {
            App::call()->orderRepository->delete($order);
        } else {
            $error = "error";
        }

        $response = [
            'status' => $error,
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();

    }

    public function actionAdd()
    {
        $params = App::call()->request->getParams();
        $session_id = (new Session())->getId();
        $created_at = date('Y-m-d H:i:s');
        $order_status_id = 1; // new
        $name = $params['name'];
        $phone = $params['phone'];
        $email = $params['email'];

        $order = new Order($session_id, $created_at, $order_status_id, $name, $phone, $email);
        App::call()->orderRepository->save($order);

        $this->actionIndex();
    }

}