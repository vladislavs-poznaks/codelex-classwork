<?php

class MessageCollection
{
    /**
     * @var Message[]
     */
    private array $messages = [];
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;

        $this->readFromFile($path);
    }

    public function add(Message $message): void
    {
        $this->messages[] = $message;

        $this->writeToFile($this->path);
    }

    /**
     * @param int $id
     * @return Message[]
     */
    public function getByUserId(int $id): array
    {
        $messages = [];
        foreach ($this->messages as $message) {
            if ($message->getUserId() === $id) {
                $messages[] = $message;
            }
        }

        return $messages;
    }

    private function readFromFile($path): void
    {
        $file = fopen($path,'r');
        while(! feof($file))
        {
            $message = fgetcsv($file);
            if (is_array($message)) {
                $this->add(new Message($message[0], $message[1]));
            }
        }
        fclose($file);
    }

    private function writeToFile($path): void
    {
        $file = fopen($path, 'w');

        foreach ($this->messages as $message) {
            fputcsv($file, $this->toArray($message));
        }

        fclose($file);
    }

    private function toArray(Message $message): array
    {
        return [
            'userId' => $message->getUserId(),
            'messageText' => $message->getMessageText(),
        ];
    }
}
