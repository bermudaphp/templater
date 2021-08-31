<?php

namespace Bermuda\Templater;

use Psr\Container\ContainerInterface;

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
    public function __invoke(ContainerInterface $container): Engine
    {
        $config = $this->getConfig($container);
      
        $engine = new Engine(
            $config[self::configTemplatesDir], 
            $config[self::configExtKey]
        );

        foreach ($config[self::configTemplatesFoldersKey] as $templateName => $templateDir)
        {
            $engine->addFolder((string) $templateName, (string) $templateDir);
        }

        foreach ($config[self::configExtendersKey] as $funcName => $extender)
        {
            $engine->registerFunction($funcName, $extender);
        }
        
        return $engine;
    }
  
    private function getConfig(ContainerInterface $container): array
    {
        $config = $container->get('config')[self::configKey] ?? [];
        
        return array_merge([
          self::configTemplatesDir => null,
          self::configExtKey => 'phtml',
          self::configTemplatesFoldersKey => [],
          self::configExtendersKey => []
        ], $config);
    }
}
