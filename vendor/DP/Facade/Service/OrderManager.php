<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 8:39
 */

namespace DP\Facade\Service;

use DP\Facade\Model\Order;

class OrderManager implements OrderServiceInterface
{

    private $shippingService;
    private $paymentService;
    private $inventoryService;
    private $status;
    private $orders;

    public function __construct()
    {
        $this->status = 'waiting';
        $this->orders = array();
    }

    public function getOrders()
    {
        return $this->orders;
    }

    public function addOrder(Order $order) {
        $this->orders[$order->getId()] = $order;
    }

    public function removeOrder($orderId)
    {
        unset($this->orders[$orderId]);
    }

    public function getShippingService()
    {
        return $this->shippingService;
    }

    public function setShippingService(Shipping $shippingService)
    {
        $this->shippingService = $shippingService;
    }

    public function getPaymentService()
    {
        return $this->paymentService;
    }

    public function setPaymentService(Payment $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function getInventoryService()
    {
        return $this->inventoryService;
    }

    public function setInventoryService(Inventory $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function makeOrder(Order $order)
    {
        if (!array_key_exists($order->getId(), $this->orders)) {
            $this->addOrder($order);
        }

        $this->status = '; Order ['.$order->getId().'] ready.';

        foreach ($order->getProducts() as $product) {
            if (!$this->inventoryService->checkAvailability($product)) {
                $this->status = 'waiting';
            }
        }

        try {
            if ($this->status !== 'waiting') {
                $this->status .= $this->paymentService->submitPayment($order);
                $this->status .= $this->shippingService->shipOrder($order);
            }
        } catch (\Exception $e) {
            $this->status .= '; Order exception: '.$e->getMessage();
        }

        return $this->status;
    }

    public function __toString()
    {
        $ret = array(
            $this->getInventoryService(),
            $this->getPaymentService(),
            $this->getShippingService(),
            $this->status
        );
        return implode('<br>', $ret);
    }

}