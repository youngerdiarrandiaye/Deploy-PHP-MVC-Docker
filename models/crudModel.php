<?php 

require_once ("models/pdoModel.php");

function createNewCharacterDB($name, $images, $health, $magic, $power, $side)
{

    $req = "INSERT INTO characters (name, images, health, magic, power, side) VALUES (:name, :images, :health, :magic, :power, :side)";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":images", $images, PDO::PARAM_STR);
    $stmt->bindParam(":health", $health, PDO::PARAM_INT);
    $stmt->bindParam(":magic", $magic, PDO::PARAM_INT);
    $stmt->bindParam(":power", $power, PDO::PARAM_INT);
    $stmt->bindParam(":side", $side, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
    return true;
}

function deleteCharacterDB($id)
{
    $req = "DELETE FROM characters WHERE id = :id";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
    return true;
}

function updateCharacterDB($name, $images, $health, $magic, $power, $side)
{

    $req = "UPDATE characters SET name =:name, images=:images,health =:health, magic=:magic, power=:power, side=:side WHERE id=:id";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":images", $images, PDO::PARAM_STR);
    $stmt->bindParam(":health", $health, PDO::PARAM_INT);
    $stmt->bindParam(":magic", $magic, PDO::PARAM_INT);
    $stmt->bindParam(":power", $power, PDO::PARAM_INT);
    $stmt->bindParam(":side", $side, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
    return true;
}
