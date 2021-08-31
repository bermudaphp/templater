<?php

namespace Bermuda\Templater;

use Psr\Container\ContainerInterface;

/**
 * Class RendererFactory
 * @package Bermuda\Templater
 */
final class RendererFactory
{
    public const configKey = EngineFactory::configKey;
    public const configExtKey = EngineFactory::configExtKey;
    public const configTemplatesFoldersKey = EngineFactory::configTemplatesFoldersKey;
    public const configExtendersKey = EngineFactory::configExtendersKey;
        
    /**
     * @param ContainerInterface $container
     * @return Renderer
     */
    public function __invoke(ContainerInterface $container): Renderer
    {
        return self::fromContainer($container);
    }
    
    public static function fromContainer(ContainerInterface $container): Renderer
    {
        return new Renderer($container->get(Engine::class));
    }
}
