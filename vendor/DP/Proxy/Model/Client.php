<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 15:47
 */

namespace DP\Proxy\Model;


class Client
{
    private $server;

    public function __construct(ServerInterface $server)
    {
        $this->server = $server;
    }

    public function request($method, $url, $parameters) {
        $this->server->connection($method, $url, $parameters);
    }

}