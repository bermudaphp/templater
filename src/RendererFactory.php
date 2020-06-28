<?php


namespace Bermuda\Templater;


use Psr\Container\ContainerInterface;


/**
 * Class RendererFactory
 * @package Bermuda\Templater
 */
class RendererFactory
{
    private ContainerInterface $container;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    /**
     * @param ContainerInterface $container
     * @return RendererInterface
     */
    public function __invoke(ContainerInterface $container): RendererInterface
    {
        $config = $this->container->get('renderer');
        
        $renderer = new Renderer($config['templates'], $config['ext'] ?? 'phtml');
        
        if(($functions = $config['functions']) != [])
        {
            foreach($functions as $name => $callback)
            {
                $renderer->getPlates()->registerFunction($name, $callback);
            }
        }
        
        return $renderer;
    }
}
