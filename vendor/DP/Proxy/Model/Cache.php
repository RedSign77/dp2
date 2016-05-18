<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 17.
 * Time: 9:12
 */

namespace DP\Proxy\Model;

use DP\General\Singleton;

class Cache extends Singleton
{

    private function __get($constName) {
        $val = null;
        switch ($constName) {
            case 'CACHE_KEY':
                $val = 'dp_cache';
                break;
        }
        return $val;
    }

    private function init()
    {
        if (!array_key_exists($this->CACHE_KEY, $_SESSION)) {
            $_SESSION[$this->CACHE_KEY] = array();
        }
    }

    public function set($key, $data) {
        $this->init();
        $_SESSION[$this->CACHE_KEY][$key] = $data;
    }

    public function has($key) {
        $this->init();
        return array_key_exists($key, $_SESSION[$this->CACHE_KEY]);
    }


}