<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php
    $this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', array('depends' => ['yii\web\YiiAsset']));
    ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Dream Team', 'url' => ['/dreamteam/index']]
        //['label' => 'Products', 'url' => ['/product']],
        //['label' => 'Import', 'url' => ['/import/index']]
    ];

    if (Yii::$app->user->isGuest) {

        if (!\frontend\models\User::isAdminExist()) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        }

        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Events',
            'url' => ['/event']
        ];

        $menuItems[] = [
            'label' => 'Product Launch',
            'url' => ['/product']
        ];

        /* @var $user \common\models\User */
        $user = Yii::$app->getUser()->getIdentity();
        if ($user->isAdmin()) {
            $menuItems[] = ['label' => 'Users', 'url' => ['/user/index']];
            $menuItems[] = [
                'label' => 'Members',
                'url' => ['member/index']
            ];

            $menuItems[] = [
                'label' => 'Roles',
                'url' => ['member/role/index']
            ];

            $menuItems[] = [
                'label' => 'Member visibility',
                'url' => ['member/visibility/index']
            ];
        }

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= 'Powered by KSP' //Yii::powered() ?></p>
    </div>
</footer>

<script>
    /*document.addEventListener("DOMContentLoaded", function() {
        $('#w0-collapse a:last').on('click', function(e) {
            var linkUrl = $(this).attr('href');
            var password = prompt('Enter admin password', '0000');
            if (password) {
                $.ajax({
                    url: '/import/login',
                    method: 'GET',
                    data: {
                        password: password
                    },
                    success: function(a, b, c) {
                        a = $.parseJSON(a);
                        if (a.success) {
                            window.location = linkUrl;
                        } else {
                            alert('Password is wrong');
                        }
                    }
                });
            }

            e.preventDefault();
            return false;
        });
    });*/
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
