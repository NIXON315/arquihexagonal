<?php
include_once "./core/Application/PostManager.php"
if(isset($_POST)){

	PostManager::updatePost();
setcookie("added",$p->title);

print "<script>window.location='index.php?view=editpost&id=$p->id';</script>";
}
?>