<?php

class Loss extends Result
{
    public function getMessage(): string
    {
        return 'Oh, no... You lost! '
            . $this->opponent->getName()
            . ' '
            . $this->results[$this->opponent->getName()][$this->player->getName()]
            . ' '
            . $this->player->getName()
            . '!';
    }
}