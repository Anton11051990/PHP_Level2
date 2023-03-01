<?php

namespace app\models\entities;

use app\models\Entity;

/**
 * Class Order
 * @package app\models\entities
 */
class Order extends Entity
{
    protected $id;
    protected $session_id;
    protected $created_at;
    protected $order_status_id;
    protected $name;
    protected $phone;
    protected $email;

    protected $props = [
        'session_id' => false,
        'created_at' => false,
        'order_status_id' => false,
        'name' => false,
        'phone' => false,
        'email' => false
    ];

    public function __construct(
        $session_id = null,
        $created_at = null,
        $order_status_id = null,
        $name = null,
        $phone = null,
        $email = null
    )
    {
        $this->session_id = $session_id;
        $this->created_at = $created_at;
        $this->order_status_id = $order_status_id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

}