<?php


namespace app\models\entities;


use app\models\Entity;

class OrderStatus extends Entity
{

    protected $id;
    protected $name;

    protected $props = [
        'name' => false
    ];

    public function __construct($name = null)
    {
        $this->name = $name;
    }

}