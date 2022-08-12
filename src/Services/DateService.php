<?php

namespace App\Services;

class DateService
{
    protected $today;

    public function __construct($date)
    {
        if($date){
            $this->today = new \DateTime($date);
        } else {
            $this->today = new \DateTime();
        }

    }

    /**
     * @return \DateTime
     */
    public function getToday(): \DateTime
    {
        return $this->today;
    }

    /**
     * @param $date
     * @param bool $time
     * @return string
     */
    public function toString($date, bool $time = false): string
    {
        /** @var \DateTime $date */
        return $date->format('d/m/Y' . ($time ? ' H:i' : ''));
    }
}