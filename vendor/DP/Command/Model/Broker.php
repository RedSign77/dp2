<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 19.
 * Time: 10:30
 */

namespace DP\Command\Model;


class Broker
{

    private $name;
    private $orders = array();

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function placeOrder(Order $order)
    {
        $this->orders[] = $order;
    }

    public function closeDay()
    {
        foreach ($this->orders as $order) {
            $order->execute();
        }
        $this->orders = array();
    }

    public function __toString()
    {

        $ret = '<br>Name: ' . $this->name . '<br>Active command list:';
        foreach ($this->orders as $order) {
            $ret .= '<br>' . $order;
        }
        return $ret;
    }

}