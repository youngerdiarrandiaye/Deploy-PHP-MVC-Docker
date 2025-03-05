<?php
require_once ("models/crudModel.php");


function createCurrentCharacter($name, $images, $health, $magic, $power, $side)
{
    if (createNewCharacterDB($name, $images, $health, $magic, $power, $side)) {
        header("Location: home");
        exit;
    } else {
        throw new Exception("Echec de la création du personnage !");
    }
}

function deleteCharacter($id)
{

    if (deleteCharacterDB($id)) {
        header("Location: home");
        exit;
    } else {
        throw new Exception("Impossible de supprimer le personnage");
    }
}

function updateCurrentCharacter($name, $images, $health, $magic, $power, $side){

    if(updateCharacterDB($name, $images, $health, $magic, $power, $side)){
        
        header("Location: home");
        exit;

    }else {
        throw new Exception("Impossible de modifier le personnage");
    }


}