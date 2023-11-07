<?php

declare(strict_types=1);

namespace Core\Controllers;

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
     * @var Validator
     */
    protected Validator $validator;

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
     * @param Validator $validator
     */
    public function setValidator(Validator $validator): void
    {
        $this->validator = $validator;
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