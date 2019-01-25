<h1 class="title"><?php echo $title ?></h1>
<?php echo $content; ?>
<?php if(!empty($allPosts)) : ?>
<hr/>
<h2>All posts</h2>
<?php foreach ($allPosts as $post) : ?>
    <div class="post" id="post-<?= $post['ID'];?>">
        <h3><a href="/news/<?= $post['ID'];?>/"><?= $post['title']; ?></a></h3>
        <p><?= $post['content']; ?></p>
    </div>
<?php endforeach; ?>
<?php endif; ?>
