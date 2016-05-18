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
        $this->server = new WebServer();
        $this->allowed = mt_rand(0, 1);

    }

    public function isAllowed()
    {
        return $this->allowed;
    }

    public function connection($method, $url, $parameters)
    {
        $request_id = microtime(true);
        $this->requests[$request_id] = array('METHOD' => $method, 'URL' => $url, 'PARAMETERS' => $parameters, 'RESPONSE' => '');
        if (!$this->allowed) {
            $this->requests[$request_id]['RESPONSE'] = 'Public access blocked.';
            return null;
        }
        $this->requests[$request_id]['RESPONSE'] =  $this->server->connection($method, $url, $parameters);
        return $this->requests[$request_id]['RESPONSE'];
    }

    public function __toString()
    {
        $ret = '<br><strong>' . get_class($this) . ' class</strong>';
        $ret .= '<br>Allowed: ' . ($this->allowed ? 'true' : 'false');
        $ret .= '<br>List of Requests';
        foreach ($this->requests as $time => $request) {
            $ret .= '<br> ' . $time . ' <strong>' . $request['METHOD'] . '</strong> ' . $request['URL'] . ' | ' . json_encode($request['PARAMETERS']);
        }
        return $ret;
    }

}
