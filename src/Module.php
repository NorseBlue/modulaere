<?php


namespace NorseBlue\Modulaere;

class Module
{
    protected $name;

    protected $description;

    public function __construct(ModuleManifest $manifest)
    {
        $this->name = $manifest->get('name');
        $this->description = $manifest->get('description');
    }
}
