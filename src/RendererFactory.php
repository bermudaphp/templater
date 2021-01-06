<?php

namespace Bermuda\Templater;


use Psr\Container\ContainerInterface;


/**
 * Class RendererFactory
 * @package Bermuda\Templater
 */
final class RendererFactory
{
    public const configKey = 'renderer';
    public const configExtKey = 'ext';
    public const configTemplatesKey = 'templates';
    public const configExtendersKey = 'extenders';
        
    /**
     * @param ContainerInterface $container
     * @return RendererInterface
     */
    public function __invoke(ContainerInterface $container): Renderer
    {
        /**
         * @var array $config
         */
        $config = $container->get('config')[self::configKey];
        
        $renderer = new Renderer($config[self::configTemplatesKey] ?? [], $config[self::configExtKey] ?? 'phtml');
        
        foreach ($config[self::configExtendersKey] ?? [] as $name => $extender)
        {
            $renderer->getEngine()->registerFunction($name, $extender);
        }
        
        return $renderer;
    }
}
