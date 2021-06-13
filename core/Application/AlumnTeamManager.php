<?php
include_once "./core/Ports/Persistence.php";
class AlumnTeamManager
{
    public static function getTeamsByAlumnId($id)
    {
        $teams = AlumnTeamData::getAllByAlumnId($id);

        return $teams;
    }
    public static function getAlumnsByTeamId($id)
    {
        $alumns = AlumnTeamData::getAllByTeamId($id);

        return $alumns;
    }

    public static function addAlumnToTeam($al_id, $t_id)
    {
        $at = AlumnTeamData::getByAT($al_id, $t_id);
        if ($at == null) {
            $at = new AlumnTeamData();
            $at->team_id = $t_id;
            $at->alumn_id = $al_id;
            $at->add();
        }
    }
}
