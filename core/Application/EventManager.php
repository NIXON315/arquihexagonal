<?php
include_once "./core/Ports/Persistence.php";
class EventManager
{
    public static function addEvent()
    {
        $r = new EventData();
        $r->title = $_POST["title"];
        $r->description = $_POST["description"];
        
        $category_id = "NULL";
        if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
        $r->category_id = $category_id;
        
        $project_id = "NULL";
        if($_POST["project_id"]!=""){ $project_id = $_POST["project_id"]; }
        $r->project_id = $project_id;
        
        $r->date_at = $_POST["date_at"];
        $r->time_at = $_POST["time_at"];
        $r->user_id = $_SESSION["user_id"];
        $r->add();
    }

    public static function getEventById($id){
        $data = EventData::getById($id);
        return $data;
    }

    public static function updateEvent(){
        $user = EventData::getById($_POST["id"]);
        $user->title = $_POST["title"];
    
        $category_id = "NULL";
        if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
        $user->category_id = $category_id;
    
        $project_id = "NULL";
        if($_POST["project_id"]!=""){ $project_id = $_POST["project_id"]; }
        $user->project_id = $project_id;
    
        $user->date_at = $_POST["date_at"];
        $user->time_at = $_POST["time_at"];
        $user->description = $_POST["description"];
        $user->update();
    }

    public static function getEventsByProjectId($id){
        $data = EventData::getAllByProjectId($_GET["id"]);

        return $data;
    }
    public static function getAllEvents(){
        return EventData::getAll();
    }
    public static function SQLQuery($sql){
        $result = EventData::getBySQL($sql); 

        return $result;
        
    }
}
