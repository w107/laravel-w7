<?php

namespace Inn20\LaravelWeiqin\W7;

use Illuminate\Config\Repository;

class Config extends Repository
{
    /**
     * Create a new configuration repository.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = $this->loadConfigs();
    }

    public function loadConfigs()
    {
        define('IN_IA', 1);

        $test_config = base_path('config.php');
        if (is_file($test_config)) {
            require $test_config;
        } else {
            require base_path('../../../data/config.php');
        }

        return $config;
    }
}
