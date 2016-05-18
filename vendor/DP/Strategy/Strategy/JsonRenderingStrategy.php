<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 14:44
 */

namespace DP\Strategy\Strategy;

use DP\Strategy\Model\ViewModel;

class JsonRenderingStrategy implements RenderingStrategyInterface
{

    public function render(ViewModel $model) {
        echo json_encode($model->getVariables(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

}