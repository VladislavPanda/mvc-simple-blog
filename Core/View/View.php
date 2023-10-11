<?php

declare(strict_types=1);

namespace Core\View;

use Core\Exceptions\ViewNotFoundException;

class View
{
    private const VIEWS_PATH = __DIR__ . '/../../resources/views/';
    private const INCLUDES_PATH = __DIR__ . '/../../resources/includes/';

    /**
     * @var string
     */
    private string $template;

    /**
     * @var array
     */
    private array $parameters;

    /**
     * @param string $templateName
     * @param array $parameters
     * @return $this
     * @throws ViewNotFoundException
     */
    public function make(string $templateName, array $parameters = []): self
    {
        $template = View::VIEWS_PATH . $templateName . '.php';

        $this->template = file_exists($template)
            ? $template
            : throw new ViewNotFoundException('View ' . $templateName . ' does not exist');
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @param $name
     * @return void
     * @throws ViewNotFoundException
     */
    public function include($name): void
    {
        $include = View::INCLUDES_PATH . $name . '.php';

        if (! file_exists($include)) {
            throw new ViewNotFoundException('View ' . $name . ' does not exist');
        }

        ob_start();
        require $include;
        echo ob_get_clean();
    }

    /**
     * @return string
     */
    public function render(): string
    {
        ob_start();
        extract(['view' => $this]); //$this->parameters);
        require $this->template;
        return ob_get_clean();
    }
}