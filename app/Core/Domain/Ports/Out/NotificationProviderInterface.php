<?php

namespace App\Core\Domain\Ports\Out;

interface NotificationProviderInterface
{
    public function send(string $destination, string $content): bool;
}
