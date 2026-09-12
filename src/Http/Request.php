<?php

namespace Mini\Http;

final class Request
{
  public function _construct(
    public readonly Method $method,
    public readonly string $uri,
    public readonly array $headers,
    public readonly array $body,
  ) {}
}
