<?

if (! function_exists('w7_config')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string|null  $key
     * @param  mixed  $default
     * @return mixed|\Inn20\LaravelWeiqin\W7\Config
     */
    function w7_config($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('w7.config');
        }

        if (is_array($key)) {
            return app('w7.config')->set($key);
        }

        return app('w7.config')->get($key, $default);
    }
}