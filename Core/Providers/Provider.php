<?php

declare(strict_types=1);

namespace Core\Providers;

use App\Providers\AppServiceProvider;
use Core\Controllers\Controller;
use Core\Http\Redirect;
use Core\Http\Request;
use Core\Session\Session;
use Core\Validating\Validator;
use Core\View\View;

class Provider
{
    public function __construct(
        private readonly Request $request,
        private readonly View $view,
        private readonly Redirect $redirect,
        //private readonly Session $session,
        private readonly AppServiceProvider $appServiceProvider
    ) {
    }

    /**
     * @param Controller $controller
     * @return void
     */
    public function register(Controller $controller): void
    {
        call_user_func([$controller, 'setRequest'], $this->request);
        call_user_func([$controller, 'setView'], $this->view);
        call_user_func([$controller, 'setRedirect'], $this->redirect);
        //call_user_func([$controller, 'setSession'], $this->session);

        $services = $this->appServiceProvider->register()->getServices();

        foreach ($services as $name => $service) {
            $explodedName = explode('\\', $name);
            $serviceName = lcfirst(end($explodedName));
            call_user_func([$controller, 'setService'], $serviceName, $service);
        }
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return View
     */
    public function getView(): View
    {
        return $this->view;
    }
}