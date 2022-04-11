<?php

namespace App;

use DI\ContainerBuilder;
use League\Plates\Engine;

class Container
{
    protected static $container;

    private static function container()
    {
        if (self::$container == null) {
            $containerBuilder = new ContainerBuilder();
            $containerBuilder->addDefinitions([
                Engine::class => function () {
                    return new Engine('../app/views');
                },
            ]);
            self::$container =  $containerBuilder->build();
        }
        return self::$container;
    }

    public static function call($handler, $vars)
    {
        return self::container()->call($handler, $vars);
    }

    public static function get($name)
    {
        return self::container()->get($name);
    }

}