<?php

namespace Bermuda\Templater;

use League\Plates\Engine as PlatesEngine;
use League\Plates\Template\Template;

/**
 * Template API and environment settings storage.
 */
class Engine extends PlatesEngine
{
    private $templateFactory = null;
  
    public function setTemplateFactory(callable $factory): Template
    {
        $this->templateFactory = static fn(Engine $engine, string $name): Template => $factory($this, $name);
    }
  
    /**
     * Create a new template.
     * @param  string   $name
     * @return Template
     */
    public function make($name)
    {
        return $this->templateFactory ? ($this->templateFactory)($this, $name)
          : parent::make($name);
    }
}
