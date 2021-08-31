<?php

namespace Bermuda\Templater;

use League\Plates\Engine as PlatesEngine;
use League\Plates\Template\Template;

class Engine extends PlatesEngine
{
    private $templateFactory = null;
    
    public function __construct(string $directory = null, string $fileExtension = 'phtml', ?callable $templateFactory = null)
    {
        parent::__construct($directory, $fileExtension);
        
        if ($templateFactory =! null)
        {
            $this->setTemplateFactory($templateFactory);
        }
        
        elseif (is_subclass_of('App\View\Template', Template::class)) 
        {
            $this->templateFactory = static fn(Engine $engine, string $name): Template
            {
                return new \App\View\Template($engine, $name);
            }
        }
    }
  
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
        return $this->templateFactory != null ? ($this->templateFactory)($this, $name)
          : parent::make($name);
    }
}
