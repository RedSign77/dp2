<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 19.
 * Time: 10:28
 */

namespace DP\Command\Model;


interface IStock
{
    public function buy();

    public function sell();
    
}