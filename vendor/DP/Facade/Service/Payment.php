<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 7:59
 */

namespace DP\Facade\Service;
use DP\Facade\Model\Order;

/**
 * Class Payment
 * @package DP\Facade\Service
 */
class Payment
{
    private $paymentMethod;

    public function __construct($paymentMethod = 'cash')
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function submitPayment(Order $order)
    {
        return $order->getNumberOfProducts() ? '; Bill created.' : 'waiting';
    }

    public function __toString()
    {
        return 'Payment method: '.$this->paymentMethod;
    }

}