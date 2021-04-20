<?php
/**
 * @param app\models\User $user;
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная | <?=$sitetitle;?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/articles.css">
    <link rel="stylesheet" href="/fonts/fonts.css">
</head>
<body>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<header id="page-header">
    <div class="wrapper">
        <a href="/" class="logo">
            <div class="logo-img"><img src="<?=$sitelogo;?>" alt="logo"></div>
            <div class="logo-title"><?=$sitetitle;?></div>
        </a>
        <nav class="header-menu">
            <ul>
				<?php foreach ( $menu as $item ): ?>
                    <li><a href="<?= $item[0]; ?>"><?= $item[1]; ?></a></li>
				<?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>

<!-- флеш-сообшение об ошибке -->
<?php if (isset($_SESSION['flesh-error'])): ?>
    <div class="alert alert-danger" role="alert">
		<?=$_SESSION['flesh-error'];?>
    </div>
	<?php unset($_SESSION['flesh-error']); ?>
<?php endif; ?>

<!-- флеш-сообшение об успехе -->
<?php if (isset($_SESSION['flesh-success'])): ?>
    <div class="alert alert-success" role="alert">
		<?=$_SESSION['flesh-success'];?>
    </div>
	<?php unset($_SESSION['flesh-success']); ?>
<?php endif; ?>

<main>

    <section id="user-panel">
        
        <?php if($user->isAuth()): ?>

            <?php if($user->hasRole("ADMIN") and isset($admin_menu)): ?>
                <?php foreach($admin_menu as $title => $link): ?>
                    <a href="<?=$link;?>"><?=$title;?></a>
                <?php endforeach; ?>
                <span class="delimiter"></span>
            <?php endif; ?>

            <p>Вы вошли как: <strong><?=$user->getLogin();?></strong></p>
            <a href="/logout">Выйти</a>
        
        <?php else: ?>

            <form action="/login" method="post">
                <div class="row pr-3">
                    <div class="col p-0">
                        <input class="form-control form-control-sm" type="text" name="login" required placeholder="Type login..">
                    </div>
                    <div class="col pr-0">
                        <input class="form-control form-control-sm" type="password" name="password" required placeholder="Type password..">
                    </div>
                    <div class="col col-2 p-0">
                        <button type="submit" class="btn btn-sm btn-secondary">Войти</button>
                    </div>
                </div>
            </form>
            
        <?php endif; ?>

    </section>