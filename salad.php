<?php
require_once 'controller/functions.php';
require_once 'controller/dataCollector.php';
$row = getSalad();
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Salad</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/aces_logo.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/foundation.min.css">
        <link rel="stylesheet" href="css/foundation-icons/foundation-icons.css"/>
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
                    <div class="fixed-top-nav-top"></div>
                    <nav id="fixed-top-nav-sec">
                        <!-- navigation Bar -->
                        <?php require_once 'includes/navbar.php'; ?>
                    </nav>
                </header>
                <br/>
                <section>
                    <div class="row">
                        <div class="panel callout primary" data-closable>
                            <strong>Salad</strong>
                            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <table style="width: 100%">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Small</th>
                                <th></th>
                                <th>Large</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($row as $r): ?>
                                <tr data-id ="<?= $r['salad_id'] ?>" data-type="Salad">
                                    <td><?= $r['salad_name']; ?></td>
                                    <td> $ <?= $r['salad_small_price']; ?></td>
                                    <td>
                                        <button type="button" class="button hollow primary expanded item-small">
                                            <i class="fi-shopping-cart"></i>
                                            <strong>Add to cart</strong>
                                        </button>
                                    </td>
                                    <td> $ <?= $r['salad_large_price']; ?></td>
                                    <td>
                                        <button type="button" class="button hollow primary expanded item-large">
                                            <i class="fi-shopping-cart"></i>
                                            <strong>Add to cart</strong>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>

                </section>
            </main>
        </div>
        <footer>
            <?php include_once 'includes/footer.php';?>
        </footer>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.2.4.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/app.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/foundation.util.mediaQuery.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
