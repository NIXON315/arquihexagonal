<?php
include_once "./core/Application/UserManager.php";
if (count($_POST) > 0) {
	$is_admin = 0;
	if (isset($_POST["is_admin"])) {
		$is_admin = 1;
	}
	$is_active = 0;
	if (isset($_POST["is_active"])) {
		$is_active = 1;
	}
	UserManager::registerUser($is_admin, $is_active);

	print "<script>window.location='index.php?view=users';</script>";
}
