<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 7:57
 */

namespace DP\Facade\Model;

/**
 * Class Order
 * @package DP\Facade\Model
 */
class Order
{

    private $products;
    private $orderId;

    public function __construct($orderId = null)
    {
        $this->setId($orderId);
        $this->products = [];
    }

    public function setId($orderId) {
        $this->orderId = $orderId;
        if ($this->orderId === null) {
            $this->orderId = time() . '-' . microtime(true);
        }
    }

    public function getId()
    {
        return $this->orderId;
    }

    public function addProduct(Product $product) {
        $this->products[$product->getProductId()] = $product;
    }

    public function getProducts() {
        return $this->products;
    }

    public function getNumberOfProducts()
    {
        return count($this->products);
    }

}