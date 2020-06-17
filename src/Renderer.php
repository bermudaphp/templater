<?php


namespace Lobster\Template;


use League\Plates\Engine;
use Lobster\Routing\Contracts\Generator;


/**
 * Class Renderer
 * @package Lobster\Template
 * @mixin Engine
 * @mixin Generator
 */
class Renderer implements Contracts\Renderer
{
    private Engine $plates;

    /**
     * Renderer constructor.
     * @param array $templates
     * @param string $ext
     */
    public function __construct(array $templates, string $ext = 'phtml')
    {
        $this->plates = new Engine();

        foreach ($templates as $name => $dir)
        {
            $this->plates->addFolder((string) $name, (string) $dir);
        }

        $this->plates->setFileExtension($ext);
    }

    /**
     * @return Engine
     */
    public function getPlates() : Engine
    {
        return $this->plates;
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