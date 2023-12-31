<?php

declare(strict_types=1);

namespace Core\Controllers;

use Core\Http\Redirect;
use Core\Http\Request;
use Core\Validating\Validator;
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
     * @var Redirect
     */
    protected Redirect $redirect;

    /**
     * @param Request $request
     * @return void
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @param View $view
     * @return void
     */
    public function setView(View $view): void
    {
        $this->view = $view;
    }

    /**
     * @param Redirect $redirect
     * @return void
     */
    public function setRedirect(Redirect $redirect): void
    {
        $this->redirect = $redirect;
    }

    /**
     * @param string $name
     * @param object $service
     * @return void
     */
    public function setService(string $name, object $service): void
    {
        $this->$name = $service;
    }
}