<?php


namespace Bermuda\Templater;


/**
 * Interface RendererInterface
 * @package Bermuda\Templater
 */
interface RendererInterface
{
    /**
     * @param string $template
     * @param array $params
     * @return string
     */
    public function render(string $template, array $params = []) : string ;
}
