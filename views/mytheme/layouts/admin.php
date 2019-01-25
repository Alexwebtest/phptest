<!DOCTYPE html>
<html>
<head>
    <title><?php echo $site['title']; ?></title>
    <link rel="stylesheet" href="/views/mytheme/assets/css/admin.css" type='text/css' />
</head>
<body class="admin">
<header>
    <p><?php echo $user['admin'] ? 'Admin page' : 'Cabinet' ?></p>
    <a href="<?php echo $site['url'] ?>">На главную</a>
</header>
<?php
if(isset($user['id'])) {
    echo $content;
} else {
    echo 'You have no permission to this page.';
}
?>
<footer>
    <div class="container"><?php echo date('H:i d.m.Y'); ?></div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/views/mytheme/assets/js/scripts.js"></script>
<script src="/views/mytheme/assets/js/admin.js"></script>
</body>
</html>
