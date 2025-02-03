<?php

declare(strict_types=1);
// First, let's see what we're actually getting from the database
$pokemonId = $_GET['id'];
$selectedPokemon = $database->select(['name'])
    ->from('pokemon')
    ->where('id', '=', $pokemonId)
    ->get();

    $pokemonName = strtolower($selectedPokemon[0]->name);  // Now we access the object inside the array
    $imageUrl = "https://img.pokemondb.net/sprites/bank/normal/{$pokemonName}.png";

    
var_dump($selectedPokemon);


require view('pokemon');
