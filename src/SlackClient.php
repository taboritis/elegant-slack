<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlackMessages;

use Stringable;

class SlackClient
{
    public function __construct(private string $webhookUrl)
    {
    }

    public function send(Stringable $message): bool|string
    {
        $ch = curl_init($this->webhookUrl);

        // Ustawienia cURL
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $message->__toString());
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Wykonanie zapytania
        $response = curl_exec($ch);

        // Sprawdzenie błędów
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return 'cURL Error: ' . $error;
        }

        // Zamknięcie cURL
        curl_close($ch);

        // Zwrócenie odpowiedzi
        return $response;
    }
}
