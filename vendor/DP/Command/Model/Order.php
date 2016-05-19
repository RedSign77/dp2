<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 19.
 * Time: 8:52
 */

namespace DP\Command\Model;


/**
 * Interface Order
 *
 * Interface of the Command pattern
 *
 * @package DP\Command\Model
 */
interface Order
{
    public function execute();
}
