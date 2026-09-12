<?php

namespace Mini\Http;

final class Client
{
  public function send(
    Method $method,
    string $uri,
    array $headers = [],
    array $body = [],
  ): string|false {
    $options = [
      'http' => [
        'method' => $method->name,
        'header' => $this->formatHeaders($headers),
        'content' => http_build_query($body),
        'ignore_errors' => true,
      ],
    ];

    $context = stream_context_create($options);

    return file_get_contents($uri, false, $context);
  }

  private function formatHeaders(array $headers): string
  {
    return implode(
      "\r\n",
      array_map(
        fn (string $name, string $value) => "$name: $value",
        array_keys($headers),
        $headers,
      ),
    );
  }
}
