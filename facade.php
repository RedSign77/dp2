<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 7:55
 */
include __DIR__ . '/vendor/autoload.php';

// Order create
$order = new \DP\Facade\Model\Order();
$order->addProduct(new \DP\Facade\Model\Product(1, 'Product A', 10));
$order->addProduct(new \DP\Facade\Model\Product(1, 'Product B', 5));
$order->addProduct(new \DP\Facade\Model\Product(1, 'Product C', 3));

// Default
$orderService = new \DP\Facade\Service\OrderManager();
$orderService->setInventoryService(new \DP\Facade\Service\Inventory(array('warehouse', 'marketplace')));
$orderService->setPaymentService(new \DP\Facade\Service\Payment('cash on delivery'));
$orderService->setShippingService(new \DP\Facade\Service\Shipping());
$orderService->addOrder($order);
$status = $orderService->makeOrder($order);
echo '<h3>Order status</h3>';
echo $status;
echo '<h3>Order service</h3>';
echo $orderService;

//
// Facade pattern
$service = new \DP\Facade\FacadeOrder();
$facadeOrder = $service->addOrder(array(
    new \DP\Facade\Model\Product(1, 'Product D', 10),
    new \DP\Facade\Model\Product(1, 'Product E', 5),
    new \DP\Facade\Model\Product(1, 'Product F', 3)
));
echo '<h3>Order status</h3>';
echo $service->checkout($facadeOrder);
echo '<h3>Order service</h3>';
echo $service;