<?php
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{userId}', function (User $user, $userId) {
    // Apenas o usuário com o ID correspondente pode se inscrever no canal
    return (int) $user->id === (int) $userId;
});