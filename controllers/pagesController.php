<?php
require_once ("models/sidesModel.php");
require_once ("models/charactersModel.php");

function  homePage()
{
    $sides=getAllSides();
    $characters=getAllCharacters();

    $data_page=[
    "description"=>"PAge d'accueil du site" ,
    "title"=>"PAge d'accueil" ,
    "views"=>"views/pages/homePage.php" ,
    "layout"=>"views/components/layout.php" ,
    "sides"=> $sides,
    "characters"=>$characters,
    ];
    drawPage($data_page);
}

function  add_character_page()
{
    $sides=getAllSides();
    
    $data_page=[
    "description"=>"PAge de creation de nouveau personnage " ,
    "title"=>"PAge de creation" ,
    "views"=>"views/pages/addPage.php" ,
    "layout"=>"views/components/layout.php" ,
    "sides"=> $sides,
    ];
    drawPage($data_page);
}

function updateCharacterPage($id){

    $character = getCharacter($id);
    $sides = getAllSides();


    $datas_page = [
        "description" => "Page de modification d'un personnage",
        "title" => "Page de modification",
        "views"=> "views/pages/updatePage.php",
        "layout" =>"views/components/layout.php",
        "character" => $character,
        "sides" => $sides,
      
    ];
    drawPage($datas_page);



}