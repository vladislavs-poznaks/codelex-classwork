<?php

namespace App\Models;

class Quote
{
    private string $symbol;
    private float $regularPrice;
    private float $regularChangePercent;
    private float $previousClose;
    private float $regularOpen;
    private float $regularDayHigh;
    private float $regularDayLow;
    private float $fiftyTwoWeekHigh;
    private float $fiftyTwoWeekLow;
    private int $regularVolume;

    public function __construct(
      string $symbol,
      float $regularPrice,
      float $regularChangePercent,
      float $previousClose,
      float $regularOpen,
      float $regularDayHigh,
      float $regularDayLow,
      float $fiftyTwoWeekHigh,
      float $fiftyTwoWeekLow,
        int $regularVolume
    ) {
        $this->symbol = $symbol;
        $this->regularPrice = $regularPrice;
        $this->regularChangePercent = $regularChangePercent;
        $this->previousClose = $previousClose;
        $this->regularOpen = $regularOpen;
        $this->regularDayHigh = $regularDayHigh;
        $this->regularDayLow = $regularDayLow;
        $this->fiftyTwoWeekHigh = $fiftyTwoWeekHigh;
        $this->fiftyTwoWeekLow = $fiftyTwoWeekLow;
        $this->regularVolume = $regularVolume;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getRegularPrice(): float
    {
        return $this->regularPrice;
    }

    public function getRegularChangePercent(): float
    {
        return $this->regularChangePercent;
    }

    public function getPreviousClose(): float
    {
        return $this->previousClose;
    }

    public function getRegularOpen(): float
    {
        return $this->regularOpen;
    }

    public function getRegularDayHigh(): float
    {
        return $this->regularDayHigh;
    }

    public function getRegularDayLow(): float
    {
        return $this->regularDayLow;
    }

    public function getFiftyTwoWeekHigh(): float
    {
        return $this->fiftyTwoWeekHigh;
    }

    public function getFiftyTwoWeekLow(): float
    {
        return $this->fiftyTwoWeekLow;
    }

    public function getRegularVolume(): int
    {
        return $this->regularVolume;
    }

    public static function create(array $data): self
    {
        return new self(
            $data['symbol'],
            (float) $data['regular_price'],
            (float) $data['regular_change_percent'],
            (float) $data['regular_previous_close'],
            (float) $data['regular_open'],
            (float) $data['regular_day_high'],
            (float) $data['regular_day_low'],
            (float) $data['fifty_two_week_high'],
            (float) $data['fifty_two_week_low'],
            (int) $data['regular_volume']
        );
    }
}