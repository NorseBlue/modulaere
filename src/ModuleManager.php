<?php

namespace NorseBlue\Modulaere;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;

class ModuleManager
{
    /**
     * Application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * The path where the modules are stored.
     *
     * @var string
     */
    protected $modules_path;

    /**
     * @var \Illuminate\Support\Collection|null
     */
    protected $modules = null;

    /**
     * ModuleManager constructor.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @param string|null $modules_path
     */
    public function __construct(Application $app, string $modules_path = null)
    {
        $this->app = $app;
        $this->modules_path = $modules_path ?: config('modulaere.paths.modules');
    }

    /**
     * Boots all the modules.
     */
    public function boot()
    {
        $this->getModules();
    }

    /**
     * Registers all the modules.
     */
    public function register()
    {

    }

    /*
     * Gets the found modules.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getModules(bool $rescan = false): Collection
    {
        if ($this->modules == null || $rescan) {
            $modules = $this->scanModules();
            $this->modules = $modules->map(function ($manifest) {
                return new Module($manifest);
            });
        }

        return $this->modules;
    }

    /**
     * Scans the modules.
     *
     * @return \Illuminate\Support\Collection
     */
    public function scanModules(): Collection
    {
        $manifests = $this->app['files']->glob(modules_path('*/module.json'));

        return collect($manifests)->mapWithKeys(function ($manifest) {
            return [
                str_replace_last('/module.json', '',
                    str_replace_first(str_finish(modules_path(), '/'), '', $manifest)) => new ModuleManifest($manifest)
            ];
        });
    }
}
