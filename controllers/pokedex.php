<?php

declare(strict_types=1);

$pokemonList = $database->select()->from('pokemon')->orderBy('id', 'asc')->get();

$pokemonList = array_map(function($pokemon) {
    return (array) $pokemon;
}, $pokemonList);

require view('pokedex');