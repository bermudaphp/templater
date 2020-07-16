<?php


namespace Bermuda\Templater;


use Psr\Container\ContainerInterface;


/**
 * Class RendererFactory
 * @package Bermuda\Templater
 */
final class RendererFactory
{
    /**
     * @param ContainerInterface $container
     * @return RendererInterface
     */
    public function __invoke(ContainerInterface $container): RendererInterface
    {
        /**
         * @var array $config
         */
        $config = $container->get('config')['renderer'];
        
        $renderer = new Renderer($config['templates'] ?? [], $config['ext'] ?? 'phtml');
        
        if (($functions = $config['functions'] ?? []) != [])
        {
            foreach ($functions as $name => $callback)
            {
                $renderer->getEngine()->registerFunction($name, $callback);
            }
        }
        
        return $renderer;
    }
}
