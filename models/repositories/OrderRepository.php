<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{

    public static function getOrder($session_id)
    {
        $sql = "SELECT * FROM `orders` WHERE `session_id` = :session_id";
        return App::call()->db->queryAll($sql, ['session_id' => $session_id]);
    }

    protected function getEntityClass()
    {
        return Order::class;
    }

    protected function getTableName()
    {
        return 'orders';
    }
}