<?php

declare(strict_types=1);

namespace tests;

use App\Pokemon;
use PHPUnit\Framework\TestCase;

class PokemonTest extends TestCase {

    public function test_create_pokemon () {

        $pokemon = new Pokemon(1, 'Charizard');
        $this->assertSame(1, $pokemon->id);
        $this->assertSame('Charizard', $pokemon->name);
        $this->assertSame("https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png", $pokemon->getImageUrl());
    }
}