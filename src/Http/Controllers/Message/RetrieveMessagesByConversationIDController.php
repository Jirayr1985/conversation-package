<?php

namespace Laravel\Conversation\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Conversation\Http\Resources\MessageResource;
use Laravel\Conversation\Repositories\Message\MessageRepository;

class RetrieveMessagesByConversationIDController extends Controller
{
    private $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function __invoke(Request $request, int $conversation_id): JsonResource
    {
        $messages = $this->messageRepository->findByConversationID($conversation_id);

        return MessageResource::collection($messages);
    }
}
