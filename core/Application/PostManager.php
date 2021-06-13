<?php
include_once "./core/Ports/Persistence.php";
class PostManager
{
    public static function addPost()
    {
        $p = new PostData();
        $p->title = $_POST['title'];
        $p->content = $_POST['content'];
        $public = 0;
        if (isset($_POST['is_public'])) {
            $public = 1;
        }

        $p->is_public = $public;
        $p->user_id = 1;
        $p->add();
    }
    public static function updatePost()
    {
        $p = PostData::getById($_POST['id']);
        $p->title = $_POST['title'];
        $p->content = $_POST['content'];
        $public = 0;
        if ($_POST['is_public']) {
            $public = 1;
        }

        $p->is_public = $public;
        // $p->user_id = 1;
        $p->update();
    }
}
