<?php

namespace App\Services;

use Psr\Log\LoggerInterface;

class Gifts
{
    public array $gifts = ['Ice cream', 'Toy car', 'Air fryer', 'Sky box'];

    public function __construct(LoggerInterface $logger)
    {
        $logger->info('Gifts were randomized!');
        shuffle($this->gifts);
    }

    /**
     * @return array|string[]
     */
    public function getGifts()
    {
        return $this->gifts;
    }
}