<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 9:24
 */

namespace DP\Facade;

use DP\Facade\Model\Order;
use DP\Facade\Service\OrderManager;
use DP\Facade\Service\Inventory;
use DP\Facade\Service\Payment;
use DP\Facade\Service\Shipping;

class FacadeOrder
{
    private $orderService;

    public function __construct()
    {
        $this->orderService = new OrderManager();
        $this->orderService->setInventoryService(new Inventory(array('warehouse', 'marketplace')));
        $this->orderService->setShippingService(new Shipping());
        $this->orderService->setPaymentService(new Payment('cash on delivery'));
    }

    public function addOrderObject(Order $order) {
        return $this->orderService->addOrder($order);
    }

    public function addOrder($products)
    {
        $order = new Order('facaded_' . time());
        foreach ($products as $product) {
            $order->addProduct($product);
        }
        $this->orderService->addOrder($order);
        return $order;
    }

    public function checkout(Order $order)
    {
        return $this->orderService->makeOrder($order);
    }

    public function __toString()
    {
        return (string)$this->orderService;
    }

}