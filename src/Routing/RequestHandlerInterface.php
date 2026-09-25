<?php

declare(strict_types=1);

namespace Mini\Routing;

interface RequestHandlerInterface
{
  public function handle(): mixed;
}
