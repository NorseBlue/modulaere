<?php

namespace NorseBlue\Modulaere;

use NorseBlue\Modulaere\Exceptions\InvalidModuleManifestException;

class ModuleManifest
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * ModuleManifest constructor.
     *
     * @param string $path
     *
     * @throws \NorseBlue\Modulaere\Exceptions\InvalidModuleManifestException
     */
    public function __construct(string $path)
    {
        $this->path = $path;
        $this->attributes = $this->parseContents($path);
    }

    /**
     * @param string $path
     *
     * @return array
     * @throws \NorseBlue\Modulaere\Exceptions\InvalidModuleManifestException
     */
    protected function parseContents(string $path): array
    {
        $contents = json_decode($path, true);

        if (json_last_error() > 0) {
            throw new InvalidModuleManifestException(
                sprintf("Error processing manifest file: %s\nError: %s", $path, json_last_error_msg())
            );
        }

        if (!config('modulaere.cache.enabled')) {
            return $contents;
        }

        return app('cache')->remember($path, config('modules.cache.lifetime'), function () use ($contents) {
            return $contents;
        });
    }

    /**
     * Gets an attribute value.
     *
     * @param string $attribute
     * @param null $default
     *
     * @return mixed|null
     */
    public function get(string $attribute, $default = null)
    {
        if (array_has($this->attributes, $attribute)) {
            return $this->attributes[$attribute];
        }

        return $default;
    }

    /**
     * Gets all the attributes.
     *
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
