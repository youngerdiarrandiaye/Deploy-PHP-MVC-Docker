<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Images</th>
      <th scope="col">Sante</th>
      <th scope="col">Magic</th>
      <th scope="col">Puissance</th>
    </tr>
  </thead>
  <tbody class="table-Light table-striped">
    <?php foreach ($characters as $character): ?>
        <tr class=" <?= $character["side"]==="dark"?'darkShadow':'lightShadow' ?> ">
            <td><?= $character['name']?></td>
            <!-- <td> <img src="public/images/personnages/personnages/<?= $character['images']?> " alt="smaug"></td> -->
            <td><?= $character['health']?></td>
            <td><?= $character['magic']?></td>
            <td><?= $character['power']?></td>
            <td class="d-flex justify-content-between">
                    <a href="#" class="btn btn-primary"> Modifier</a>
                    <a href="#" class="btn btn-danger"> Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>