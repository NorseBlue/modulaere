<?php

namespace NorseBlue\Modulaere\Providers;

use Illuminate\Support\ServiceProvider;
use NorseBlue\Modulaere\Commands\MakeCommand;

class CommandsServiceProvider extends ServiceProvider
{
    /**
     * The available commands
     *
     * @var array
     */
    protected $commands = [
        MakeCommand::class,
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return $this->commands;
    }
}

