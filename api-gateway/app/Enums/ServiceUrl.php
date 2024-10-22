<?php

namespace App\Enums;

enum ServiceUrl: string
{
    case AUTH_SERVICE = 'http://127.0.0.1:8001/api';
    case BRAND_SERVICE = 'http://127.0.0.1:8002/api';
    /**
     * Get the full URL for a specific endpoint.
     *
     * @param  string  $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = ''): string
    {
        return $this->value . ($endpoint ? '/' . ltrim($endpoint, '/') : '');
    }
}
