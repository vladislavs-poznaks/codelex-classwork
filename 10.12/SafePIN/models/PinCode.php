<?php

class PinCode
{
    private string $pin;
    private string $path;
    private string $pinToUnlock;

    public function __construct(string $path, string $pinToUnlock)
    {
        $this->path = $path;
        $this->pinToUnlock = $pinToUnlock;

        $this->pin = $this->readFromFile($path);
    }

    public function addNumber(string $number): void
    {
        if (strlen($this->pin) < 4) {
            $this->pin .= $number;
            $this->writeToFile($this->path, $this->pin);
        }
    }

    public function getResult(): array
    {
        $feedback = [
            'result' => 'Enter PIN',
            'pin' => '____'
        ];

        if (strlen($this->pin) === 4) {
            $feedback['result'] = $this->pin === $this->pinToUnlock ? 'PIN correct!' : 'PIN incorrect!';

            $this->pin = '';
            $this->writeToFile($this->path, $this->pin);

        } else {

            $feedback['pin'] =
                str_repeat('X', strlen($this->pin))
                . str_repeat('_', 4 - strlen($this->pin));

        }

        return $feedback;
    }

    private function readFromFile($path): string
    {
        $file = fopen($path,'r');
        $pin = fread($file, (filesize($path) ? filesize($path) : 1));
        fclose($file);

        return $pin;
    }

    private function writeToFile($path, $pin): void
    {
        $file = fopen($path,'w');
        fwrite($file, $pin);
        fclose($file);
    }
}
