<?php

namespace App\Core\Application\UseCases;

use App\Core\Domain\Ports\Out\NotificationProviderInterface;

class SendNotification
{    /**
     * SendNotification constructor.
     * @param NotificationProviderInterface $provider
     */
    public function __construct(
        protected NotificationProviderInterface $provider
    ) {}

    public function execute(string $to, string $message): bool
    {
        return $this->provider->send($to, $message);
    }
}