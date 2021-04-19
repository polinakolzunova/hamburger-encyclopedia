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