<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 15:32
 */

include __DIR__ . '/vendor/autoload.php';

$ws = new \DP\Proxy\Model\WebServer();
echo get_class($ws) . ' created, start time: ' . $ws->connection('getStartTime', 'http://www.google.hu', '');
$ws->connection('setStartTime', 'http://www.google.hu', time() - mt_rand(14400, 168000));
echo '<br>' . get_class($ws) . ' start time: ' . $ws->connection('getStartTime', 'http://www.google.hu', '');

$proxies = array();
for ($i = 0; $i < 5; $i++) {
    $proxies[$i] = new \DP\Proxy\Model\ProxyServer();
    for ($j = 0; $j < 20; $j++) {
        $proxies[$i]->connection('getStartTime', 'http://www.'.$i.'-'.$j.'.com', '');
    }
    echo $proxies[$i];
}
