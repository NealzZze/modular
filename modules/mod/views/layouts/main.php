<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\widgets\SideAuth;
use app\widgets\Alert;
use yii\bootstrap\Html;

$cart_count = null;
if (isset($_SESSION['cart'])) {
    if ($_SESSION['cart'] != null) {
        foreach ($_SESSION['cart'] as $key => $goods) {
            if ($goods != null) {
                $cart_count += ($goods['count']);
            }
        }
    }
}
$cart_label = Html::tag('span', $cart_count, ['class' => "badge badge-light"]);

$this->beginPage();
?>
<html>

<head>
    <?php $this->head(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nikita Venikov">
    <title><?= $this->title ?></title>
    <style>
        body {
            background-color: #603894;
        }
    </style>
    <style type="text/css">
        .hide-on-mobile {
            display: inline;
        }

        @media screen and (max-width : 500px) {
            .hide-on-mobile {
                visibility: hidden;
                display: none;
            }
        }

        span {
            position: relative;
            top: -5px;
        }
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="frontend/css/style.css">
</head>

<body>
    <?php $this->beginBody(); ?>
    <div class="wrapper">
        <div class="content">
            <div>
                <?php
                NavBar::begin([
                    'brandLabel' => Yii::$app->name,
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-default navbar-fixed-top navbar-inverse',
                    ]
                ]);
                $items = [
                    ['label' => 'Home', 'url' => [Yii::$app->homeUrl]],
                    ['label' => 'Games', 'url' => ['/games']],
                    ['label' => 'Store', 'url' => ['/store']],
                    ['label' => 'About', 'url' => ['/about']],
                    ['label' => 'Cart ' . $cart_label, 'url' => ['/cart'], 'encode' => false],


                    //['label' => 'Sign Up', 'url' => ['/signup']],
                    //['label' => 'Sign In', 'url' => ['/signin']],
                    //['label' => 'Log Out', 'url' => ['/logout']]
                ];
                if (Yii::$app->user->isGuest) {
                    $items[] = ['label' => 'Sign In', 'url' => ['/signin']];
                    $items[] = ['label' => 'Sign Up', 'url' => ['/signup']];
                } else {
                    $items[] = ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/logout']];
                }
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $items
                ]);
                NavBar::end();
                ?>
            </div>
            <div class="hide-on-mobile">
                <div class="col-md-2">
                    <div class="container-fluid" style="margin-top:80px">
                        <div class="list-group">
                            <a href="#" class="list-group-item active">
                                <h4>Menu</h4>
                            </a>
                            <a href="#" class="list-group-item">Welcome</a><b>
                                <a href="#" class="list-group-item">item # 1</a>
                                <a href="#" class="list-group-item">item # 2</a>
                                <a href="#" class="list-group-item">item # 3</a>
                                <a href="#" class="list-group-item">item # 4</a>
                                <a href="#" class="list-group-item">item # 5</a>
                                <a href="#" class="list-group-item">item # 6</a>
                                <a href="#" class="list-group-item">item # 7</a>
                                <a href="#" class="list-group-item">item # 8</a>
                                <a href="#" class="list-group-item">item # 9</a>
                                <a href="#" class="list-group-item">item # 10</a>
                                <a href="#" class="list-group-item">item # 11</a>
                                <a href="#" class="list-group-item">item # 12</a>
                                <a href="#" class="list-group-item">item # 13</a></b>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading"></div>
                        <div class="container-fluid" id="main-panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <?= Alert::widget() ?>
                                            <?= $content ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hide-on-mobile">
                <div class="col-md-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="container-fluid" style="margin-top:60px;">
                                <?php
                                if (Yii::$app->user->isGuest) {
                                    echo SideAuth::widget();
                                } else {
                                    echo '┬┴┬┴┤( ͡° ͜ʖ├┬┴┬┴';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="col-md-12" id="footer">
                <div class="container-fluid" style="background: #514C54;color:#000000;">

                    <footer class="footer">
                        <footer class="page-footer font-small mdb-color lighten-3 pt-4">

                            <!-- Footer Links -->
                            <div class="container text-center text-md-left">
                                <!-- Grid row -->
                                <div class="row">
                                    <!-- Grid column -->
                                    <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
                                    </div>
                                    <!-- Grid column -->
                                    <div class="col-md-8" style="text-align:center;font-family:Verdana, Geneva, Tahoma, sans-serif ; font-style:inherit">
                                        <!-- Contact details -->
                                        <ul class="list-unstyled">
                                            <li>
                                                <p>
                                                    <i class="material-icons">home</i><span> Moscow, Russia</span></p>
                                            </li>
                                            <li>
                                                <p>
                                                    <i class="material-icons">email</i><span> <a href="mailto:iam@inealse.ru?subject=From inealse.ru"> iam@inealse.ru</a></span></p>
                                            </li>
                                            <li>
                                                <p>
                                                    <i class="material-icons">phone</i><span> temporarily unavailable</span></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Links -->
                                <!-- Copyright -->
                                <div class="footer-copyright text-center py-3">© 2019 Copyright:
                                    <a href="#" style="color:#000000;bold;"><b>Nealse</b></a>
                                    <p></p>
                                </div>
                                <!-- Copyright -->
                        </footer>
                </div>
                </footer>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This site may use cookies.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="modal-yes-btn">I agree</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody(); ?>
    <script src='frontend/js/script.js'></script>
</body>

</html>
<?php $this->endPage(); ?>