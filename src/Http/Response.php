<?php

namespace Mini\Http;

final class Response
{
  public function _construct(
    public readonly Method $method,
    public readonly string $url,
    public readonly array $headers,
    public readonly array $body,
    public readonly int $status,
  ) {}
}
