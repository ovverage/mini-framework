<?php

namespace Mini\Routing;

use Mini\Http\Method;

final class Router implements RouterInterface
{
  /** @var RouteInterface[] */
  private array $routes = [];

  public function createRoute(Method $method, string $path, RequestHandlerInterface $handler): void {
    $this->routes[] = new Route($method->value, $path, $handler);
  }

  public function dispatchRoute(Method $method, string $uri): mixed
  {
    foreach ($this->routes as $route) {
      if ($route->matches($method->value, $uri)) {
        return $route->handle();
      }
    }

    throw new RuntimeException('Route not found', 404);
  }
}
