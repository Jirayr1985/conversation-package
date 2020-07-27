<?php

namespace Laravel\Conversation\Http\Controllers\Conversation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Conversation\Http\Resources\ConversationResource;
use Laravel\Conversation\Repositories\Conversation\ConversationRepository;


class RetrieveUserConversationsController extends Controller
{
    private $conversationRepository;

    public function __construct(ConversationRepository $conversationRepository)
    {
        $this->conversationRepository = $conversationRepository;
    }

    public function __invoke(Request $request, int $user_id): JsonResource
    {
        $conversations = $this->conversationRepository->findByOwner($user_id);

        return ConversationResource::collection($conversations);
    }
}
