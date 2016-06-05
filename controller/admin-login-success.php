<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require_once 'define.php';
require_once '../model/db.php';

/** Session Starts */
session_start();

/**
 * If $_POST['loginSubmit'] is not set then
 * it will redirect to the 404 page
 */
if (!isset($_POST['loginSubmit'])) {
    header('Location: '. SERVER.'/404');
    return;
}

/**
 * @var string $user     Username of admin
 * @var string $pass     Password of that admin
 */
$user = $_POST['username'];
$pass = $_POST['password'];

/** Check if the username and password is null or not */
if ($user == '' || $pass == '') {
    header('Location: '.SERVER.'/admin?err=1');
    return;
}

/** Verify the Username with Password */
if (!checkPass($user, $pass)) {
    header('Location: '.SERVER.'/admin?err=2');
    return;
}

/**
 * Session Variables:
 * @var string $_SESSION['user']     Contains Username of the admin
 * @var string $_SESSION['name']     Contains Name of the admin
 * @var string $_SESSION['id']       Contains ID of the admin
 */
$_SESSION['user'] = $user;
$_SESSION['name'] = getUserName($user);
$_SESSION['id']   = getUserId($user);

/** Redirect to the Admin Home Page */
header('Location: '.SERVER.'/admin');
