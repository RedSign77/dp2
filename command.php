<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 15:17
 */
include __DIR__ . '/vendor/autoload.php';

//
// Részvény
//
$stock = new \DP\Command\Model\Stock();

//
// Brókerek
//
$brokers = array();
$brokers[] = new \DP\Command\Model\Broker('Broker Béla');
$brokers[] = new \DP\Command\Model\Broker('Broker Elemér');

foreach ($brokers as $broker) {
    for ($i = 0; $i <= 10; $i++) {
        if (mt_rand(0, 1)) {
            $broker->placeOrder(new \DP\Command\Command\Buy($stock));
        } else {
            $broker->placeOrder(new \DP\Command\Command\Sell($stock));
        }
    }
    echo '<br>' . $broker;
    echo '<br><strong>Place orders</strong><br>';
    $broker->closeDay();
}

