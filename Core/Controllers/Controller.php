<?php

declare(strict_types=1);

namespace Core\Controllers;

use Core\View\View;

abstract class Controller
{
    /**
     * @var View
     */
    protected View $view;

    /**
     * @param View $view
     * @return void
     */
    public function setView(View $view): void
    {
        $this->view = $view;
    }
}