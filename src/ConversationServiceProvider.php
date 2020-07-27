<?php

namespace Laravel\Conversation;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Laravel\Conversation\Exceptions\Handler;
use Laravel\Conversation\Repositories\Conversation\ConversationRepository;
use Laravel\Conversation\Repositories\Conversation\EloquentConversationRepository;
use Laravel\Conversation\Repositories\Message\EloquentMessageRepository;
use Laravel\Conversation\Repositories\Message\MessageRepository;

class ConversationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        \App::singleton(
            ExceptionHandler::class,
            Handler::class
        );

        $this->app->bind(ConversationRepository::class, EloquentConversationRepository::class);
        $this->app->bind(MessageRepository::class, EloquentMessageRepository::class);

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->mergeConfigFrom(
            __DIR__.'/config/conversation.php',
            'conversation'
        );

        $this->publishes([
            __DIR__.'/config/conversation.php' => config_path('conversation.php'),
        ]);
    }

    public function register()
    {

    }
}
