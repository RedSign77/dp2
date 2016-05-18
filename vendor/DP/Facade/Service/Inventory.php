<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 7:58
 */

namespace DP\Facade\Service;
use DP\Facade\Model\Product;

/**
 * Class Inventory
 * @package DP\Facade\Service
 */
class Inventory
{

    private $inventories = [];

    public function __construct($inventories)
    {
        $this->inventories = $inventories;
    }

    public function checkAvailability(Product $product) {
        return $product->getQty();
    }

    public function __toString()
    {
        return 'Inventories: '.implode(', ', $this->inventories);
    }

}