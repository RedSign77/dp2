<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 15:49
 */

namespace DP\Proxy\Model;


use MongoDB\BSON\Timestamp;

class WebServer implements ServerInterface
{

    private $startTime;

    public function __construct()
    {
        $this->startTime = time();
    }

    public function connection($method, $url, $parameters)
    {
        if (method_exists($this, $method)) {
            return $this->$method($parameters);
        }
        return get_class($this) . ' method ' . $method . ' not exists.';
    }

    private function getStartTime($paramteres)
    {
        return date("Y-m-d H:i:s", $this->startTime);
    }

    private function setStartTime($time)
    {
        $this->startTime = (int)$time;
    }

}