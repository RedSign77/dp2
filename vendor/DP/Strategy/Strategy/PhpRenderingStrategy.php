<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 14:42
 */

namespace DP\Strategy\Strategy;

use DP\Strategy\Model\ViewModel;

class PhpRenderingStrategy implements RenderingStrategyInterface
{
    public function render(ViewModel $model) {
        foreach ($model->getVariables() as $key => $value) {
            $$key = $value;
        }
        include_once($model->getTemplate());
    }
}