<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\engine\Session;
use app\models\repositories\BasketRepository;
use app\models\entities\Basket;


class BasketController extends Controller
{
    public function actionIndex()
    {
        $session_id = session_id();

       // $basket = (new BasketRepository())->getBasket($session_id);
        $basket = App::call()->basketRepository->getBasket($session_id);
        $summ = null;
        foreach($basket as $item){
            $summ += $item['price'];
        }

        echo $this->render('basket/index', [
            'basket' => $basket,
            'summ' => $summ
        ]);

    }

    public function actionDelete()
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = (new Session())->getId();
        $basket = App::call()->basketRepository->getOne($id);
        $error = "ok";
        if ($session_id == $basket->session_id) {
            App::call()->basketRepository->delete($basket);
        } else {
           $error = "error";
        }

        $response = [
            'status' => $error,
            'count' => App::call()->basketRepository->getCountWhere('session_id', $session_id)
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();

    }

    public function actionAdd()
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = session_id();

        $basket = new Basket($session_id, $id);
        App::call()->basketRepository->save($basket);

        $response = [
            'status' => 'ok',
            'count' => (new BasketRepository())->getCountWhere('session_id', $session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}