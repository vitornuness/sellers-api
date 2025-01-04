<?php
declare(strict_types= 1);

namespace Core;

class Router
{
    /**
     * Lista das rotas disponiveis
     * @var array
     */
    protected static array $routes = [];

    /**
     * Redirecionar para o Controller correspondente a URI e metodo HTTP
     * @param string $uri
     * @param string $method
     * @return void
     */
    public static function findRoute(string $uri, string $method = 'GET'): void
    {
        if ($route = self::getRoute($uri, $method) ?? null) {

            $controllerClass = $route['controller']['class'];
            $controllerMethod = $route['controller']['method'];

            if (method_exists($controllerClass, $controllerMethod)) {
                $controller = new $controllerClass();
                call_user_func([$controller, $controllerMethod]);
                return;
            }
        }

        echo '404';
    }

    /**
     * Adicionar uma nova rota metodo HTTP GET com URI e controller com seu metodo
     * @param string $uri
     * @param array $controller
     * @return void
     */
    public static function get(string $uri, array $controller): void
    {
        self::insert($uri, $controller, 'GET');
    }

    /**
     * Retornar uma rota ou nulo pela URI e metodo HTTP
     * @param string $uri
     * @param string $method
     * @return array|null
     */
    public static function getRoute(string $uri, string $method): array|null
    {
        foreach (self::$routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                return $route;

            }
        }

        return null;
    }

    /**
     * Adicionar uma nova rota com URI, controller com seu metodo e o metodo HTTP
     * @param string $uri
     * @param array $controller
     * @param string $method
     * @return void
     * @throws \Exception
     */
    protected static function insert(string $uri, array $controller, string $method): void
    {
        if (self::has($uri, $method)) {
            throw new \Exception(message: 'A rota '. $method .'::'. $uri .' esta duplicada');
        }

        self::$routes[] = [
            'uri'        => $uri,
            'controller' => [
                'class'  => $controller[0],
                'method' => $controller[1]
            ],
            'method'     => $method
        ];
    }

    /**
     * Verificar se a URI e o metodo HTTP existem
     * @param string $uri
     * @param string $method
     * @return bool
     */
    public static function has(string $uri, string $method): bool
    {
        return ! self::getRoute($uri, $method) === null;
    }
}