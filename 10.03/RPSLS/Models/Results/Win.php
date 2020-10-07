<?php

class Win extends Result
{
    public function getMessage(): string
    {
        return 'You Won! '
            . $this->player->getName()
            . ' '
            . $this->results[$this->player->getName()][$this->opponent->getName()]
            . ' '
            . $this->opponent->getName()
            . '!';
    }
}