<?php
include_once "./core/Ports/Persistence.php";
class BlockManager{
    public static function addBlock(){
        $p = new BlockData();
        $p->name = $_POST['name'];
        $p->team_id = $_POST['team_id'];
        $p->add();
    }
    public static function deleteBlock($id){
        $user = BlockData::getById($id);
        $team  =$user->team_id;
        $user->del();
    }
    public static function getBlockByTeamId($id){
        $blocks = BlockData::getAllByTeamId($_GET["team_id"]);
        return $blocks;
    }
}
