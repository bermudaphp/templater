<?php

namespace Bermuda\Templater;

/**
 * Class ConfigProvider
 * @package Bermuda\Templater
 */
final class ConfigProvider extends \Bermuda\Config\ConfigProvider
{
    /**
     * @inheritDoc
     */
    protected function getFactories(): array
    {
        return [RendererInterface::class => RendererFactory::class];
    }
}
