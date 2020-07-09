<?php


namespace Bermuda\Templater;


use League\Plates\Engine;


/**
 * Class Renderer
 * @package Bermuda\Templater
 */
class Renderer implements RendererInterface
{
    private Engine $engine;

    public function __construct(array $templates, string $ext = 'phtml')
    {
        $this->engine = new Engine();

        foreach ($templates as $name => $dir)
        {
            $this->engine->addFolder((string) $name, (string) $dir);
        }

        $this->engine->setFileExtension($ext);
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @param string $template
     * @param array $params
     * @return string
     */
    public function render(string $template, array $params = []): string
    {
        return $this->plates->render($template, $params);
    }
}
