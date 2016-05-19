<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 19.
 * Time: 10:17
 */

namespace DP\Command\Command;
use DP\Command\Model\Order;
use DP\Command\Model\IStock;

/**
 * Class BuyStock
 * @package DP\Command\Model
 */
class Buy implements Order
{

    private $stock;

    public function __construct(IStock $stock)
    {
        $this->stock = $stock;
    }

    public function execute() {
        $this->stock->buy();
    }

    public function __toString()
    {
        return ' - Buy: '.$this->stock;
    }

}