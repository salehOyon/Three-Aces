<?php
require_once 'controller/define.php';
require_once 'controller/functions.php';
require_once 'controller/dataCollector.php';
$row = getLasagna();
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Lasagna</title>
        <?php require_once 'includes/head.php';?>
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
                    <div class="small-12 columns">
                        <?php if(!count($row)): ?>
                            <div class="row">
                                <h3>No Data Found.</h3>
                            </div>
                        <?php else: ?>
                        <div class="small-8 small-centered columns">
                            <div class="panel callout primary" data-closable>
                                <strong>Home made Lasagna Ravioli or Manicotti</strong>
                                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <table style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <!--Lasagna List-->
                                <?php foreach($row as $r): ?>
                                    <tr data-id ="<?= htmlentities(stripcslashes($r['lasagna_id']), ENT_QUOTES, 'UTF-8'); ?>" data-type="Lasagna">
                                        <td><?= htmlentities(stripcslashes($r['lasagna_name']), ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td> $ <?= htmlentities(stripcslashes($r['lasagna_price']), ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <button type="button" class="button hollow primary expanded item">
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
                        <?php endif; ?>
                    </div>

                </section>
            </main>
        </div>

        <!--Footer-->
        <footer>
            <?php include_once 'includes/footer.php';?>
        </footer>

        <?php include_once 'includes/jsscript.php';?>
    </body>
</html>
