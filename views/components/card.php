<div class="card 
    <?= $character["side"]==="dark"?
    'darkShadow':'lightShadow' ?> 

"style="width: 18rem;">
    <img src="public/images/personnages/personnages/<?= $character['images']?> " class="card-img-top" alt="smaug">
    <div class="card-body">
        <h5 class="card-title"><?= $character['name']?></h5>
        <p class="card-text d-flex justify-content-between">
            <span><b>Santé :</b></span>
            <span><?= $character["health"]?> PV</span>
        </p>
        <p class="card-text d-flex justify-content-between">
            <span><b>Magie :</b></span>
            <span> <?= $character["magic"]?>  PM</span>
        </p>
        <p class="card-text d-flex justify-content-between">
            <span><b>Puissance :</b></span>
            <span><?= $character["power"]?> Atk</span>
        </p>
        
        <div class="d-flex justify-content-between">
            <form action="modify_character" method="POST">
                <input type="hidden" value="<?= $character['id']   ?>" name="id" >
                <button class="btn btn-primary">Modifier</button>
           </form>

            <form action="delete_character" method="POST">
                <input type="hidden" value="<?= $character['id']   ?>" name="id" >
                <button class="btn btn-danger" data-toggle="tooltip" title="Supprimer">Supprimer</button>
           </form>


        </div>
    </div>
</div>

