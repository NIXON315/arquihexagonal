<?php
include_once "./core/Ports/Persistence.php";
class CalificationManager
{
    public static function addCalification()
    {
        $found = CalificationData::getByBA($_POST["block_id"], $_POST["alumn_id"]);
        if ($found == null && $_POST["val"] != "") {
            $assis = new CalificationData();
            $assis->alumn_id = $_POST["alumn_id"];
            $assis->block_id = $_POST["block_id"];
            $assis->val = $_POST["val"];
            $assis->add();
        } else if ($found = !null && $_POST["val"] != "") {
            $found = CalificationData::getByBA($_POST["block_id"], $_POST["alumn_id"]);
            $found->val = $_POST["val"];
            $found->update();
        } else if ($_POST["val"] == "") {
        }
    }

    public static function getCalificationByBlockAndAlumn($block_id, $alumn_id)
    {
        $calification  = CalificationData::getByBA($block_id, $alumn_id);
        return $calification;
    }
}
