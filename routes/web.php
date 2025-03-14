<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Events\MessageSent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'users' => User::whereNot('id', auth()->id())->get()
    ]);
})->middleware(['auth'])->name('dashboard');

Route::get('/chat/{friend}', function (User $friend) {
    return view('chat', [
        'friend' => $friend
    ]);
})->middleware(['auth'])->name('chat');

Route::get('/messages/{friend}', function (User $friend) {
    return ChatMessage::query()
        ->where(function ($query) use ($friend) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $friend->id);
        })
        ->orWhere(function ($query) use ($friend) {
            $query->where('sender_id', $friend->id)
                ->where('receiver_id', auth()->id());
        })
        ->with(['sender', 'receiver'])
        ->orderBy('id', 'asc')
        ->get();
})->middleware(['auth']);

Route::post('/messages/{friend}', function (Request $request, User $friend) {
    $message = ChatMessage::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $friend->id,
        'text' => $request->message,
    ]);

    broadcast(new MessageSent($message, auth()->user()))->toOthers();

    return $message->load('sender', 'receiver');
})->middleware(['auth']);



require __DIR__.'/auth.php';