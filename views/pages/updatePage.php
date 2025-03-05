<?php

// showArray($character); 
?>

<h1 class="text-center mb-4">Modifier un Combattant</h1>


<form action="updateCharacter" method="POST">
    <input type="hidden" value="<?= $character['id']   ?>" name="id">
    <div class="mb-3">
        <label for="name" class="form-label">Nom du personnage</label>
        <input type="text" class="form-control" id="name" value="<?= $character['name']  ?>" name="name" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Avatar du personnage</label>
        <input type="text" class="form-control" id="images" value="<?= $character['images']  ?>" name="images" required>
    </div>
    <div class="mb-3">
        <label for="health" class="form-label">Santé du personnage</label>
        <input type="number" class="form-control" id="health" value="<?= $character['health']  ?>" name="health" required>
    </div>
    <div class="mb-3">
        <label for="magic" class="form-label">Magie du personnage</label>
        <input type="number" class="form-control" id="magic" value="<?= $character['magic']  ?>" name="magic" required>
    </div>
    <div class="mb-3">
        <label for="power" class="form-label">Puissance du personnage</label>
        <input type="number" class="form-control" id="power" value="<?= $character['power']  ?>" name="power" required>
    </div>
    <div class="mb-3">
        <label for="side" class="form-label">Coté de la force ?</label>
        <select name="side" id="side" type="text" class="form-select" required>
            <?php foreach ($sides as $side) : ?>
                <option value="<?= $side['side'] ?>"
                    <?= $side['side'] === $character['side'] ? "selected" : ""    ?>><?= $side['side'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3 w-100">Modifier le personnage</button>

</form>