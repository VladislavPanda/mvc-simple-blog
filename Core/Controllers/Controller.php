<?php

declare(strict_types=1);

namespace Core\Controllers;

use Core\Http\Request;
use Core\View\View;

abstract class Controller
{
    /**
     * @var View
     */
    protected View $view;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @param View $view
     * @return void
     */
    public function setView(View $view): void
    {
        $this->view = $view;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }
}