<?php

declare(strict_types=1);

?>

<ul>
    <?php foreach ($pokemonList as $pokemon): ?>
        <li>
            <a href="/pokemon?id=<?= $pokemon['id'] ?>">
                <?= htmlspecialchars($pokemon['name']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

