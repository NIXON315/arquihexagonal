<?php
include_once "./core/Ports/Persistence.php";
class UserManager{
    public static function registerUser($is_admin=0){
        $user = new UserData();
        $user->name = $_POST["name"];
        $user->lastname = $_POST["lastname"];
        $user->username = $_POST["username"];
        $user->password = sha1(md5($_POST["password"]));
        $user->is_admin=$is_admin;
        $user->add();
    }

    public static function updateUser($is_admin=0,$is_active=0){
        $user = UserData::getById($_POST["user_id"]);
        $user->name = $_POST["name"];
        $user->lastname = $_POST["lastname"];
        $user->username = $_POST["username"];
        $user->email = $_POST["email"];
        $user->is_admin=$is_admin;
        $user->is_active=$is_active;
        $user->update();
    }
    
    public static function getUserData($id){
        $user = UserData::getById($id);
        return $user;
    }

    public static function getAllUsers(){
        $user = UserData::getAll();
        return $user;
    }

}

?>