<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 19.
 * Time: 8:54
 */

namespace DP\Command\Model;


class Stock implements IStock
{

    private $name = 'AionHill';
    private $quantity = 10;

    public function buy()
    {
        echo $this->quantity . 'x ' . $this->name . ' stock purchased.<br>';
    }

    public function sell()
    {
        echo $this->quantity . 'x ' . $this->name . ' stock sold.<br>';
    }

    public function __toString()
    {
        return $this->name . ' stock (' . $this->quantity . 'x)';
    }

}
