<?php

namespace Bermuda\Templater;

use Psr\Container\ContainerInterface;

/**
 * Class RendererFactory
 * @package Bermuda\Templater
 */
class RendererFactory
{
    public const configKey = EngineFactory::configKey;
    public const configExtKey = EngineFactory::configExtKey;
    public const configTemplatesFoldersKey = EngineFactory::configTemplatesFoldersKey;
    public const configExtendersKey = EngineFactory::configExtendersKey;
        
    /**
     * @param ContainerInterface $container
     * @return Renderer
     */
    public function __invoke(ContainerInterface $container): RendererInterface
    {
        return new Renderer($container->get(Engine::class));
    }
}
