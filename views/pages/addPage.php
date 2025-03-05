<?php 

//showArray($sides);
// showArray($characters);

?>
<?php
// showArray($sides);
?>

<h1 class="text-center mb-4">Ajouter un Combattant🏋️‍♂️</h1>


<form action="createNewCharacter" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Nom du personnage</label>
        <input type="text" class="form-control" id="name" placeholder="Entrez le nom de ce personnage" name="name" required>
    </div>
    <div class="mb-3">
        <label for="images" class="form-label">Avatar du personnage</label>
        <input type="text" class="form-control" id="images" placeholder="Entrez l'avatar de ce personnage" name="images" required>
    </div>
    <div class="mb-3">
        <label for="health" class="form-label">Santé du personnage</label>
        <input type="number" class="form-control" id="health" placeholder="Entrez les points de vie de ce personnage" name="health" required>
    </div>
    <div class="mb-3">
        <label for="magic" class="form-label">Magie du personnage</label>
        <input type="number" class="form-control" id="magic" placeholder="Entrez les points de magie de ce personnage" name="magic" required>
    </div>
    <div class="mb-3">
        <label for="power" class="form-label">Puissance du personnage</label>
        <input type="number" class="form-control" id="power" placeholder="Entrez la puissance de ce personnage" name="power" required>
    </div>
    <div class="mb-3">
        <label for="side" class="form-label">Coté de la force ?</label>
        <select name="side" id="side" type="text" class="form-select" required>
            <option disabled selected value="">⏬ Choisissez le coté du personnage ⏬</option>
            <?php foreach ($sides as $side) : ?>
                <option value="<?= $side['side'] ?>"><?= $side['side'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3 w-100">Créer le personnage</button>

</form>