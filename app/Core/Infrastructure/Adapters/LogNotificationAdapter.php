<?php

namespace App\Core\Infrastructure\Adapters;

use App\Core\Domain\Ports\Out\NotificationProviderInterface;
use Illuminate\Support\Facades\Log;

class LogNotificationAdapter implements NotificationProviderInterface
{
    public function send(string $destination, string $content): bool
    {
        Log::info("Notificação Hexagonal enviada para [$destination]: $content");
        return true;
    }
}