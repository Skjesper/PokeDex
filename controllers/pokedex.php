<?php

declare(strict_types=1);

$pokemonList = $database->select()->from('pokemon')->orderBy('id', 'asc')->get();

// Convert objects to arrays
$pokemonList = array_map(function($pokemon) {
    return (array) $pokemon;
}, $pokemonList);


require __DIR__ . '/../views/pokedex.view.php';