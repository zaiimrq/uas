<?php

namespace Tugas\core;

class Route
{
    private static array $routes;

    public static function add(
        string $method,
        string $path,
        array $controller,
        array $middleware = []
    ): void {
        self::$routes[] = [
            "method"        => $method,
            "path"          => $path,
            "controller"    => $controller,
            "middleware"    => $middleware
        ];
    }


    public static function run(): mixed
    {
        $path = "/";

        if (isset($_SERVER["PATH_INFO"]))
            $path = $_SERVER["PATH_INFO"];

        $method = $_SERVER["REQUEST_METHOD"];


        foreach (self::$routes as $route) {
            if ($route["path"] == $path && $route["method"] == $method) {
                foreach ($route["middleware"] as $middleware) {
                    (new $middleware)->middleware();
                }

                array_slice($route["controller"], 0, 2);

                $controller = $route["controller"][0];
                $function = $route["controller"][1];

                return (new $controller)->$function();
            }
        }

        return http_response_code(404);
    }


    public static function is(string $path): bool
    {
        return ($_SERVER["PATH_INFO"] ?? "/") == $path;
    }
}
