<?php

class OptionCollection
{
    private array $options;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * @return Option[]
     */
    public function all(): array
    {
        return $this->options;
    }

    public function optionExists(Option $optionInQuestion): bool
    {
        foreach ($this->options as $option) {
            if ($optionInQuestion instanceof $option) {
                return true;
            }
        }

        return false;
    }

    public function getRandom(): Option
    {
        return $this->options[array_rand($this->options)];
    }

    public function getByName(string $name): Option
    {
        foreach ($this->options as $option) {
            if ($option instanceof $name) {
                return $option;
            }
        }
    }
}
