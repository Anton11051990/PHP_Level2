<?php

use app\models\entities\Basket;

class BasketTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider providerBasketConstructor
     */
    public function testBasketConstructor($session_id, $product_id)
    {
        $basket = new Basket($session_id, $product_id);
        $this->assertEquals($session_id, $basket->session_id);
        $this->assertEquals($product_id, $basket->product_id);
        $this->assertEquals(false, $basket->props['session_id']);
        $this->assertEquals(false, $basket->props['product_id']);
    }

    public function providerBasketConstructor()
    {
        return [
            ["adfasdfagdfhdfjdfghsdfgasdgadfhsdafhagfag", 1],
            ["jklgil;glhkyfkfghjsrthyfsdgjdfhjdghjdfhjfh", 2],
            ["iopuiolfhmkjhtyjhdfgthsjxdhjmjkjgfhjdtykjg", 3],
        ];
    }
}