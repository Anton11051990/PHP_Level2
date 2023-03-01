<?php

use app\models\entities\Products;

class ProductTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider providerProductConstructor
     */
    public function testProductConstructor($name, $description, $price)
    {
        $product = new Products($name, $description, $price);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($price, $product->price);
        $this->assertEquals(false, $product->props['name']);
        $this->assertEquals(false, $product->props['name']);
        $this->assertEquals(false, $product->props['name']);
    }

    public function providerProductConstructor()
    {
        return [
            ["Tea", "Description", 5],
            ["Tea2", "Description2", 53],
            ["Tea3", "Description3", 54],
        ];
    }
}