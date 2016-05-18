<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 14:41
 */

namespace DP\Strategy\Model;


class ViewModel
{
    private $variables;
    private $template;

    public function __construct(array $variables = array())
    {
        $this->variables = $variables;
    }

    public function getVariables()
    {
        return $this->variables;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }
}