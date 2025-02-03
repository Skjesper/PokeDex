<?php

declare(strict_types=1);

namespace App;

class Pokemon {
    public function __construct(
        private int $id,
        private string $name
    ) {}

    public function getImageUrl(): string {
        return "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$this->id}.png";
    }
}



