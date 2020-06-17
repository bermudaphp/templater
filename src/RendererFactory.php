<?php


namespace Lobster\Template;


use Psr\Container\ContainerInterface;


/**
 * Class RendererFactory
 * @package Lobster\Template
 */
class RendererFactory
{
    private ContainerInterface $container;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    /**
     * @param array $templates
     * @param string $ext
     * @return Renderer
     */
    public function __invoke() : Renderer
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
