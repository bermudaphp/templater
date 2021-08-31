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
        /**
         * @var array $config
         */
        $config = $container->get('config')[self::configKey];
        
        $renderer = new Renderer($config[self::configTemplatesFoldersKey] ?? [], $config[self::configExtKey] ?? 'phtml');
        
        foreach ($config[self::configExtendersKey] ?? [] as $name => $extender)
        {
            $renderer->getEngine()->registerFunction($name, $extender);
        }
        
        return $renderer;
    }
}
