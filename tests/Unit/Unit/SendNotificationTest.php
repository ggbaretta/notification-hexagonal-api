<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Core\Application\UseCases\SendNotification;
use App\Core\Domain\Ports\Out\NotificationProviderInterface;
use Mockery;

class SendNotificationTest extends TestCase
{
    public function deve_enviar_uma_notificacao_com_sucesso_atraves_do_provedor()
    {
        $providerMock = Mockery::mock(NotificationProviderInterface::class);
        
        $providerMock->shouldReceive('send')
            ->once()
            ->with('Guilherme', 'Mensagem de Teste')
            ->andReturn(true);

        $useCase = new SendNotification($providerMock);
        
        $result = $useCase->execute('Guilherme', 'Mensagem de Teste');
        
        $this->assertTrue($result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}