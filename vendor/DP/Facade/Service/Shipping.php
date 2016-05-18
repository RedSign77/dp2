<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 8:00
 */

namespace DP\Facade\Service;
use DP\Facade\Model\Order;

/**
 * Class ShippingService
 * @package DP\Facade
 */
class Shipping
{

    private $shippingMethod;

    public function __construct($shippingMethod = 'free')
    {
        $this->shippingMethod = $shippingMethod;
    }

    public function shipOrder(Order $order)
    {
        return 'Shipped: '.$this->shippingMethod;
    }

    public function __toString()
    {
        return 'Shipping method: '.$this->shippingMethod;
    }

}