<?php


namespace Lobster\Contracts;


/**
 * Interface Renderer
 * @package Lobster\Contracts
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
