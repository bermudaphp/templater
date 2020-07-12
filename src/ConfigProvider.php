<?php


namespace Bermuda\Templater;


final class ConfigProvider
{
    public function __invoke(): array
    {
        return ['dependencies' => ['factories' => [RendererInterface::class => RendererFactory::class]]];
    }
}
