<?php

abstract class Option
{
    protected OptionCollection $wins;

    public function getResult(Option $option): Result
    {
        if ($this instanceof $option) {
            return new Tie($this, $option);
        } elseif ($this->wins->optionExists($option)) {
            return new Win($this, $option);
        } else {
            return new Loss($this, $option);
        }
    }

    public function getName(): string
    {
        return get_class($this);
    }
}
