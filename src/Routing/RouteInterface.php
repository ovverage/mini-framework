<?php

declare(strict_types=1);

namespace Mini\Routing;

use Mini\Http\Method;

interface RouteInterface
{
  public function matches(Method $method, string $uri): bool;

  public function handle(): mixed;
}
