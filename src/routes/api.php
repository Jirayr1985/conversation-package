<?php

use Illuminate\Support\Facades\Route;
use Laravel\Conversation\Http\Controllers\Conversation\RetrieveUserConversationsController;
use Laravel\Conversation\Http\Controllers\Message\CreateMessageController;
use Laravel\Conversation\Http\Controllers\Message\RetrieveMessagesByConversationIDController;

Route::group(['prefix' => 'api'], function () {

    Route::prefix('conversations')->group(function () {
        Route::post('/', CreateMessageController::class);
        Route::get('/{conversation_id}/messages', RetrieveMessagesByConversationIDController::class);
    });

    Route::prefix('users')->group(function () {
        Route::get('/{user_id}/conversations', RetrieveUserConversationsController::class);
    });

});
