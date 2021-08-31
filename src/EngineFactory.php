<?php

namespace Bermuda\Templater;

use Psr\Container\ContainerInterface;

/**
 * Class RendererFactory
 * @package Bermuda\Templater
 */
final class EngineFactory
{
    public const configTemplatesDir = 'templates_dir';
    public const configKey = 'renderer';
    public const configExtKey = 'ext';
    public const configTemplatesFoldersKey = 'templates_folders';
    public const configExtendersKey = 'extenders';
        
    /**
     * @param ContainerInterface $container
     * @return Renderer
     */
    public function __invoke(ContainerInterface $container): RendererInterface
    {
        $config = $this->getConfig($container);
      
        $engine = new Engine(
            $config[self::configTemplatesDir], 
            $config[self::configExtKey]
        );
        
        foreach ($config[self::configTemplatesFoldersKey] as $templateName => $templateDir)
        {
            $this->engine->addFolder((string) $templateName, (string) $templateDir);
        }

        foreach ($config[self::configExtendersKey] as $funcName => $extender)
        {
            $renderer->getEngine()->registerFunction($funcName, $extender);
        }
        
        return $engine;
    }
  
    private function getConfig(ContainerInterface $container): array
    {
        $config = $container->get('config')[self::configKey] ?? [];
        
        return array_merge([
          self::configTemplatesDir => APP_ROOT.'/templates',
          self::configExtKey => 'phtml',
          self::configTemplatesFoldersKey => [],
          self::configExtendersKey => []
        ], $config);
    }
}
