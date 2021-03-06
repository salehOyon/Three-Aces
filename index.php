<?php
require_once 'controller/define.php';
require_once 'controller/functions.php'; 
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Three Aces</title>
        <?php require_once 'includes/head.php'; ?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="cover-image"></div>
        <div id="wrap">
            <main>
                <header>
                    <?php include_once 'includes/upperHeader.php';?>
                    <nav>
                        <?php require_once 'includes/navbar.php'; ?>
                    </nav>
                </header>
                <br/>
                <section>
                    <div class="small-12 columns">
                        <div class="large-5 small-centered columns">
                            <?php include_once 'includes/slider.php';?>
                        </div>
                    </div>
                </section>
            </main>
        </div>
        <footer>
            <?php include_once 'includes/footer.php';?>
        </footer>

        <?php include_once 'includes/jsscript.php';?>
    </body>
</html>
