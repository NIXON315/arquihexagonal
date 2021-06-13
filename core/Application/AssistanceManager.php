<?php
include_once "./core/Ports/Persistence.php";
class AssistanceManager
{
    public static function addAssistence()
    {
        $found = AssistanceData::getByATD($_POST["alumn_id"], $_POST["team_id"], $_POST["date_at"]);
        if ($found == null && $_POST["kind_id"] != "") {
            $assis = new AssistanceData();
            $assis->alumn_id = $_POST["alumn_id"];
            $assis->team_id = $_POST["team_id"];
            $assis->kind_id = $_POST["kind_id"];
            $assis->date_at = $_POST["date_at"];
            $assis->add();
        } else if ($found = !null && $_POST["kind_id"] != "") {
            $found = AssistanceData::getByATD($_POST["alumn_id"], $_POST["team_id"], $_POST["date_at"]);

            $found->kind_id = $_POST["kind_id"];
            $found->update();
        } else if ($_POST["kind_id"] == "") {
            $found = AssistanceData::getByATD($_POST["alumn_id"], $_POST["team_id"], $_POST["date_at"]);
            $found->del();
        }
    }

    public static function getAssistenceByTeamAndData($alumn_id,$team_id,$date_at){
        $asist = AssistanceData::getByATD($alumn_id,$team_id,$date_at);
        return $asist;
    }
}
