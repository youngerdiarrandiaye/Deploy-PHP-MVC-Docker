<?php
/* echo "coucou cocu";
echo "</br>";
print_r($_GET); */
//on verifie ce qui se passe dans page

require_once "controllers/pagesController.php";
require_once "controllers/crudController.php";
require_once "controllers/utilities.php";

try {

    if (empty($_GET['page'])){
        $page="home";
    }else{
        $path=explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page=$path[0];
    }

switch ($page) {
    case "home":
        homePage();
        break;
    case "add_character_page":
        add_character_page();
        break;

    case "createNewCharacter":
        //showArray($_POST);
        //on securise les donnees
            $name = htmlspecialchars($_POST["name"]);
            $images = htmlspecialchars($_POST["images"]);
            $health = htmlspecialchars($_POST["health"]);
            $magic = htmlspecialchars($_POST["magic"]);
            $power = htmlspecialchars($_POST["power"]);
            $side = htmlspecialchars($_POST["side"]);
            if (
                empty($name) ||
                empty($images) ||
                empty($health) ||
                empty($magic) ||
                empty($power) ||
                empty($side)
            ) {
                throw new Exception("Tous les champs sont obligatoires !");
            }
            createCurrentCharacter($name, $images, $health, $magic, $power, $side);
        break;

    case "delete_character":
        $id = $_POST['id'];
        deleteCharacter($id);
        
        break;
    case "modify_character":
            // showArray($_POST);
        $id = $_POST['id'];
        updateCharacterPage($id);
        break;
    
    case "updateCharacter":
        $id = $_POST["id"];
        $name = htmlspecialchars($_POST["name"]);
        $images = htmlspecialchars($_POST["images"]);
        $health = htmlspecialchars($_POST["health"]);
        $magic = htmlspecialchars($_POST["magic"]);
        $power = htmlspecialchars($_POST["power"]);
        $side = htmlspecialchars($_POST["side"]);
        if (
            empty($name) ||
            empty($images) ||
            empty($health) ||
            empty($magic) ||
            empty($power) ||
            empty($side)
        ) {
            throw new Exception("Tous les champs sont obligatoires !");
        }
        updateCurrentCharacter($id, $name, $images, $health, $magic, $power, $side);
        break;
        
    default:
        throw new Exception("la page n'exite pas");
   
}}catch(Exception $e) {
    echo "Erreur:". $e->getMessage();
}