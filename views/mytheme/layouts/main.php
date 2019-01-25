<!DOCTYPE html>
<html>
<head>
    <title><?php echo $site['title']; ?></title>
    <link rel="stylesheet" href="/views/mytheme/assets/css/style.css" type='text/css' />
</head>
<body class="body">
<header>
    <div class="container">
        <div>
            <h1 class="title">
                <a href="<?php echo $site['url']; ?>"><?php echo $site['title']; ?></a>
            </h1>
            <p class="description"><?php echo $site['description']; ?></p>
        </div>
        <div>
            <ul class="menu">
                <li><a href="#">Item 1</a></li>
                <li><a href="#">Item 2</a></li>
                <li><a href="#">Item 3</a></li>
                <li><a href="#">Item 4</a></li>
            </ul>
        </div>
        <div class="auth">
            <?php if (!isset($user['id'])) : ?>
            <a class="login" href="/account/login/">Авторизация</a>
            <?php else : ?>
                <p>Привет, <a href="/cabinet/"><?php echo $user['login']; ?>!</a></p>
            <a class="logout" href="#">Выйти</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<div class="content container">
<?= $content; ?>
</div>
<footer>
    <hr/>
    <div class="container"><?php echo date('H:i d.m.Y'); ?></div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/views/mytheme/assets/js/scripts.js"></script>
</body>
</html>
