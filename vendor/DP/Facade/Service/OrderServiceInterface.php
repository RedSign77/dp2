<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 8:05
 */

namespace DP\Facade\Service;

use DP\Facade\Model\Order;

interface OrderServiceInterface
{
    public function makeOrder(Order $order);
}