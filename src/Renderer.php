<?php

namespace Bermuda\Templater;

/**
 * Class Renderer
 * @package Bermuda\Templater
 */
class Renderer implements RendererInterface
{
    private Engine $engine;

    public function __construct(Engine $engine = null)
    {
        $this->engine = $engine ?? new Engine();
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @inheritDoc
     */
    public function render(string $template, array $params = []): string
    {
        return $this->engine->render($template, $params);
    }
}
