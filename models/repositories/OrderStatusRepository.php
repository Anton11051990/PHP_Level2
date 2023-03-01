<?php


namespace app\models\repositories;

use app\engine\App;
use app\models\entities\OrderStatus;
use app\models\Repository;


class OrderStatusRepository extends Repository
{

    public static function getOrderStatus($id)
    {
        $sql = "SELECT * FROM `order_status` WHERE `id` = :id";

        return App::call()->db->queryAll($sql, ['id' => $id]);
    }

    protected function getEntityClass()
    {
        return OrderStatus::class;
    }

    protected function getTableName()
    {
        return 'order_status';
    }

}