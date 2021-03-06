<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 15:50
 */

namespace DP\Proxy\Model;


class ProxyServer implements ServerInterface
{
    private $server;
    private $allowed;
    private $requests = array();

    public function __construct()
    {
        $this->server = WebServer::getInstance();
        $this->allowed = mt_rand(0, 1);

    }

    public function isAllowed()
    {
        return $this->allowed;
    }

    public function connection($method, $url, $parameters)
    {
        $request_id = time().microtime(true);
        $response = 'Public access blocked.';
        if ($this->allowed) {
            $response = $this->server->connection($method, $url, $parameters);
        }
        $this->requests[$request_id] = array('METHOD' => $method, 'URL' => $url, 'PARAMETERS' => $parameters, 'RESPONSE' => $response);
        return $this->requests[$request_id]['RESPONSE'];
    }

    public function __toString()
    {
        $ret = '<br><strong>' . get_class($this) . ' class</strong>';
        $ret .= '<br>Allowed: ' . ($this->allowed ? 'true' : 'false');
        $ret .= '<br>List of Requests';
        foreach ($this->requests as $time => $request) {
            $ret .= '<br> > <strong>' . $request['METHOD'] . '</strong> ' . $request['URL'] . ' | ' . json_encode($request['PARAMETERS']);
            $ret .= '  > '.$request['RESPONSE'];
        }
        return $ret;
    }

}
