<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 14:54
 */

namespace DP\Strategy\View;

use DP\Strategy\Strategy\RenderingStrategyInterface;
use DP\Strategy\Model\ViewModel;

class Renderer
{

    private $strategy;
    private $viewModel;

    public function __construct(RenderingStrategyInterface $strategy, ViewModel $model)
    {
        $this->strategy = $strategy;
        $this->viewModel = $model;
    }

    public function render()
    {
        $this->strategy->render($this->viewModel);
    }

}
