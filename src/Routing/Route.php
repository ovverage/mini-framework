<?php

namespace Mini\Routing;

use Mini\Http\Method;

final class Route implements RouteInterface
{
  public function __construct(
    private readonly Method $method,
    private readonly string $path,
    private readonly RequestHandlerInterface $handler,
  ) {}

  public function matches(Method $method, string $uri): bool
  {
    return $this->method === $method && $this->path === $uri;
  }

  public function handle(): mixed
  {
    return $this->handler->handle();
  }
}
