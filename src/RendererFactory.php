<?php


namespace Lobster\Template;


/**
 * Class RendererFactory
 * @package Lobster\Template
 */
class RendererFactory
{
    /**
     * @param array $templates
     * @param string $ext
     * @return Renderer
     */
    public function __invoke(array $templates = [], string $ext = 'phtml') : Renderer
    {
        return new Renderer($templates, $ext);
    }
}