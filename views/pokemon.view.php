<?php

declare(strict_types=1);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
</head>
<body>
    <h1>Pokemon: <?= htmlspecialchars($pokemonName) ?></h1>
    <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($pokemonName) ?> Image">
</body>
</html>