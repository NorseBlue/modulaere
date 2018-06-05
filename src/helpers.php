<?php

if (!function_exists('vendor_path')) {
    /**
     * Get the path to the vendor folder.
     *
     * @param  string $path
     *
     * @return string
     */
    function vendor_path($path = '')
    {
        return base_path('vendor') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('modules_path')) {
    /**
     * Get the path to the modules folder.
     *
     * @param  string $path
     *
     * @return string
     */
    function modules_path($path = '')
    {
        return config('modulaere.paths.modules') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('module_path')) {
    /**
     * Get the path to a specific module folder.
     *
     * @param  string $name
     * @param  string $path
     *
     * @return string
     */
    function module_path($name, $path = '')
    {
        $module = app('modulaere')->find($name);

        return $module->getPath() . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
