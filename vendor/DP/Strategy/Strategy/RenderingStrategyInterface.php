<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 14:40
 */

namespace DP\Strategy\Strategy;

use DP\Strategy\Model\ViewModel;

interface RenderingStrategyInterface
{
    public function render(ViewModel $model);
}
