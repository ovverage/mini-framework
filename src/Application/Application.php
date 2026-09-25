<?php

declare(strict_types=1);

namespace Mini\Application;

use LogicException;
use Mini\Http\Request;
use Mini\Routing\Router;
use Mini\Routing\RouterInterface;

final class Application
{
  private static ?self $instance = null;

  private readonly RouterInterface $router;

  private function __construct()
  {
    $this->router = new Router();
  }

  public static function getInstance(): self
  {
    return self::$instance ??= new self();
  }

  public function router(): RouterInterface
  {
    return $this->router;
  }

  public function run(Request $request): mixed
  {
    return $this->router->dispatchRoute($request->method, $request->uri);
  }

  private function __clone(): void
  {
  }

  public function __serialize(): array
  {
    throw new LogicException('Application singleton cannot be serialized.');
  }

  public function __wakeup(): void
  {
    throw new LogicException('Application singleton cannot be unserialized.');
  }
}
