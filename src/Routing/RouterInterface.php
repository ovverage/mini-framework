<?php

declare(strict_types=1);

namespace Mini\Routing;

use Mini\Http\Method;

interface RouterInterface
{
  public function createRoute(Method $method, string $path, RequestHandlerInterface $handler): void;

  public function dispatchRoute(Method $method, string $uri): mixed;
}
