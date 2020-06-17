<?php


namespace Lobster\Template\Contracts;


/**
 * Interface Renderer
 * @package Lobster\Template\Contracts
 */
interface Renderer
{
    /**
     * @param string $template
     * @param array $params
     * @return string
     */
    public function render(string $template, array $params = []) : string ;
}