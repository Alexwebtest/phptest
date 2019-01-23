<!DOCTYPE html>
<html>
<head>
    <title><?php echo $info['site_title']; ?></title>
    <link rel="stylesheet" href="/views/mytheme/assets/css/style.css" type='text/css' />
</head>
<body class="body">
<?php
v($_SESSION);
?>
<header>
    <h1 class="title"><a href="<?php echo $info['site_url']; ?>"><?php echo $info['site_title']; ?></a></h1>
    <ul class="menu">
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
        <li><a href="#">Item 4</a></li>
    </ul>
    <div class="auth">
        <?php /*if(user_logged_in()): ?>
            <p>Hello, <?php echo $username; ?></p>
            <a class="logout" href="#">Выйти</a>
        <?php else :*/ ?>
            <a class="login" href="/account/login/">Авторизация</a>
            <a class="logout" href="#">Выйти</a>
        <?php // endif; ?>
    </div>

</header>