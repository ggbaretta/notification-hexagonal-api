<?php

namespace App\Http\Controllers;

use App\Core\Application\UseCases\SendNotification;
use App\Http\Requests\SendNotificationRequest;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    public function __construct(
        protected SendNotification $sendNotification
    ) {}

    public function __invoke(SendNotificationRequest $request): JsonResponse
    {
        $data = $request->validated();

        $success = $this->sendNotification->execute(
            $data['to'], 
            $data['message']
        );

        if ($success) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Notificação processada pela arquitetura hexagonal!'
            ], 201);
        }

        return response()->json(['error' => 'Falha ao enviar'], 500);
    }
}