<?php

namespace Bermuda\Templater;

use Psr\Container\ContainerInterface;

/**
 * Class RendererFactory
 * @package Bermuda\Templater
 */
class RendererFactory
{
    public const configKey = 'renderer';
    public const configExtKey = 'ext';
    public const configTemplatesFoldersKey = 'templates';
    public const configExtendersKey = 'extenders';
        
    /**
     * @param ContainerInterface $container
     * @return Renderer
     */
    public function __invoke(ContainerInterface $container): RendererInterface
    {
        return new Renderer($container->get(Engine::class));
    }
}
