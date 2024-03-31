<?php

namespace App\Enums;

enum ShowType: string
{
    case MOVIE = 'movie';

    case SERIES = 'series';

    public function label(): string
    {
        return match($this) {
          ShowType::MOVIE => 'Film',
          ShowType::SERIES => 'Seriál'
        };
    }
}