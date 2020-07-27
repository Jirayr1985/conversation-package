<?php

namespace Laravel\Conversation\Repositories\Message;

use Illuminate\Pagination\LengthAwarePaginator;
use Laravel\Conversation\Models\Message;

interface MessageRepository
{
    public function create(array $data): Message;

    public function findByConversationID(int $conversation_id): LengthAwarePaginator;
}
