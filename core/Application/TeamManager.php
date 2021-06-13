<?php
include_once "./core/Ports/Persistence.php";
class TeamManager{
    public static function addTeam(){
        $user = new TeamData();
        $user->name = $_POST["name"];
        $user->is_favorite = isset($_POST["is_favorite"]) ? 1 :0;
        $user->user_id = $_SESSION["user_id"];
        
        $user->add();
    }
    public static function deleteTeamById($id){
        $user = TeamData::getById($_GET["id"]);
        $user->del();
    }
    public static function updateTeam(){
        $user = TeamData::getById($_POST["team_id"]);
        $user->name = $_POST["name"];
        $user->is_favorite = isset($_POST["is_favorite"]) ? 1 :0;
        
        $user->update();
    }

    public static function getTeamById($id){

        $team = TeamData::getById($_GET["id"]);
        return $team;
    }
    public static function getFavoriteTeamByUserId($id){
        $data = TeamData::getFavoritesByUserId($id);
        return $data;
    }

    public static function getTeamsByUserId($id){

        $allteams = TeamData::getAllByUserId($_SESSION["user_id"]);
        return $allteams;
    }
}

?>