<?php

class Message
{
    private int $userId;
    private string $messageText;

    public function __construct(int $userId, string $messageText)
    {
        $this->userId = $userId;
        $this->messageText = $messageText;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getMessageText(): string
    {
        return $this->messageText;
    }
}
