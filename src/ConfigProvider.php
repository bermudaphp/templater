<?php

namespace Bermuda\Templater;

final class ConfigProvider extends \Bermuda\Config\ConfigProvider
{
    /**
     * @inheritDoc
     */
    protected function getFactories(): array
    {
        return [
            Engine::class => EngineFactory::class,
            RendererInterface::class => RendererFactory::class,
        ];
    }
}
