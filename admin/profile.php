<?php
session_start();
require_once '../controller/define.php';

if (isset($_COOKIE['id']) || isset($_SESSION['user'])) {
    require_once '../controller/adminController.php';
    $key = $_COOKIE['id'];
    $row = admininfo($key);
} else {
    header('Location: '.SERVER.'/404');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'includes/head.php';?>
</head>

<body>

    <header>
        <title>Profile</title>
        <?php include_once 'includes/header.php';?>
    </header>

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <?php include_once 'includes/menu.php'; ?>
            <!-- end: Main Menu -->

            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
            </noscript>

            <!-- start: Content -->
            <div id="content" class="span10">
                
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="<?= SERVER ?>/admin">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="<?= SERVER ?>/admin/profile">Profile</a></li>
                </ul>
                <h1 class="text-center">Personal Information</h1>
                <hr/>
                <div class="row">
                    <button class="btn btn-info editProfile"><i class="icon-pencil"></i> Edit Profile</button>
                    <br/><br/>
                    <table class="table table-striped profile" data-id="<?= $row['id']; ?>">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td id="nm"><?= $row['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td id="us"><?= $row['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td id="em"><?= $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>:</td>
                                <td id="cn"><?= $row['country']; ?></td>
                            </tr>
                        <form id="passReset">
                            <tr>
                                <td>New Password</td>
                                <td>:</td>
                                <td><input type="password" required class="form-control" id="newPass" pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'The password must contain one or more uppercase characters, one or more lowercase characters, one or more numeric values, one or more special characters, and length must be greater than or equal to 4' : ''); if(this.checkValidity()) form.cpass.pattern = this.value;" /></td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td>:</td>
                                <td><input type="password" required class="form-control" name="cpass" id="confirmNewPass" pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');"/></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <button class="btn btn-success" type="submit"><i class="icon-upload-alt"></i> Update Password</button>
                    </div>
                        </form>

                </div>
            </div><!--/.fluid-container-->
            <!-- end: Content -->
        </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <?php $profile = true; $passUpdate = true; include_once 'includes/modals.php';?>
    <div class="clearfix"></div>

    <footer>
        <?php include_once 'includes/footer.php'; ?>
    </footer>

    <?php include_once 'includes/jsscript.php';?>
</body>
</html>

