<?php

declare(strict_types=1);

namespace Core\View;

class View
{
    private const VIEWS_PATH = __DIR__ . '/../../resources/views/';

    /**
     * @var string
     */
    private string $templateName;

    /**
     * @var array
     */
    private array $parameters;

    /**
     * @param string $templateName
     * @param array $parameters
     * @return $this
     */
    public function make(string $templateName, array $parameters = []): self
    {
        $this->templateName = $templateName;
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        ob_start();
        extract($this->parameters);
        require View::VIEWS_PATH . $this->templateName . '.php';
        return ob_get_clean();
    }
}