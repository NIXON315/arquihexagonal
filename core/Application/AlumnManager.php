<?php
include_once "./core/Ports/Persistence.php";
include_once "./core/Application/AlumnTeamManager.php";
class AlumnManager
{
    public static function addAlumn()
    {
        $user = new AlumnData();
        $user->name = $_POST["name"];
        $user->lastname = $_POST["lastname"];
        $user->address = $_POST["address"];
        $user->email = $_POST["email"];
        $user->phone = $_POST["phone"];
    
        $user->c1_fullname = $_POST["c1_fullname"];
        $user->c1_address = $_POST["c1_address"];
        $user->c1_phone = $_POST["c1_phone"];
        $user->c1_note = $_POST["c1_note"];
    
        $user->user_id = $_SESSION["user_id"];
    
    
        $u = $user->add();
        return $u;
    }
    public static function deleteAlumno($id)
    {
        $teams = AlumnTeamManager::getTeamsByAlumnId($id);
        foreach ($teams as $t) {
            $t->del();
        }

        $alumn = AlumnData::getById($_GET["id"]);
        $alumn->del();
    }

    public static function updateAlumno()
    {
        $user = AlumnData::getById($_POST["alumn_id"]);
        $user->name = $_POST["name"];
        $user->lastname = $_POST["lastname"];
        $user->address = $_POST["address"];
        $user->email = $_POST["email"];
        $user->phone = $_POST["phone"];

        $user->c1_fullname = $_POST["c1_fullname"];
        $user->c1_address = $_POST["c1_address"];
        $user->c1_phone = $_POST["c1_phone"];
        $user->c1_note = $_POST["c1_note"];

        $user->user_id = $_SESSION["user_id"];


        $u = $user->update();
    }

    public static function getAlumnoById($id){
        $user = AlumnData::getById($id);
       
        return $user;
    }
}
