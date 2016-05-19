<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 19.
 * Time: 10:25
 */

namespace DP\Command\Command;
use DP\Command\Model\Order;
use DP\Command\Model\IStock;

class Sell implements Order
{
    private $stock;

    public function __construct(IStock $stock)
    {
        $this->stock = $stock;
    }

    public function execute()
    {
        $this->stock->sell();
    }

    public function __toString()
    {
        return ' - Sell: '.$this->stock;
    }

}
