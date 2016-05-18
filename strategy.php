<?php
/**
 * Created by PhpStorm.
 * User: nemeth.zoltan
 * Date: 2016. 05. 13.
 * Time: 12:45
 */
include __DIR__ . '/vendor/autoload.php';

$view = new \DP\Strategy\Model\ViewModel(
    array(
        'title' => 'Stratégia programtervezési minta',
        'page_title' => 'Stratégia minta',
        'page_text' => 'A viselkedési minták közé tartozik és arra szolgál, hogy egy algoritmus viselkedését (akár futási időben) új működési mechanizmussal ruházzunk fel.',
    )
);

$view->setTemplate('templates/template1.php');

if (array_key_exists('html', $_GET)) {
    $phpRenderer = new \DP\Strategy\View\Renderer(new \DP\Strategy\Strategy\PhpRenderingStrategy(), $view);
    $phpRenderer->render();
} else {
    $jsonRenderer = new \DP\Strategy\View\Renderer(new \DP\Strategy\Strategy\JsonRenderingStrategy(), $view);
    $jsonRenderer->render();
}
