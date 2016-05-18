<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 7:54
 */

namespace DP\Facade\Model;

/**
 * Class Product
 * @package DP\Facade\Model
 */
class Product
{
    private $productId;
    private $name;
    private $quantity;

    public function getProductId()
    {
        return $this->productId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getQty()
    {
        return $this->quantity;
    }

    public function __construct($productId, $name, $quantity = 0)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->quantity = $quantity;
    }

}
