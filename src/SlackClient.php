<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack;

use Stringable;

readonly class SlackClient
{
    public function __construct(private string $webhookUrl)
    {
    }

    public function send(Stringable $message): bool|string
    {
        $ch = curl_init($this->webhookUrl);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, (string)$message);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return 'cURL Error: ' . $error;
        }

        curl_close($ch);

        return $response;
    }
}
