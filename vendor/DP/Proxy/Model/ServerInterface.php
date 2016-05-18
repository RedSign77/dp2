<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 15:47
 */

namespace DP\Proxy\Model;


interface ServerInterface
{
    public function connection($method, $url, $parameters);
}