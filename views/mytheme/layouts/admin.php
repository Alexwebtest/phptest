<!DOCTYPE html>
<html>
<head>
    <title><?php echo $info['site_title']; ?></title>
    <link rel="stylesheet" href="/views/mytheme/assets/css/admin.css" type='text/css' />
</head>
<body class="admin">
<header>
    <p>Admin page</p>
    <a href="<?php echo $info['site_url'] ?>">На главную</a>
</header>
<?= $content; ?>
<footer>
    <hr/>
    <div class="container"><?php echo date('H:i d.m.Y'); ?></div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/views/mytheme/assets/js/scripts.js"></script>
</body>
</html>
