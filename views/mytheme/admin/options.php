<div class="admin-container">
    <div class="menu">
        <?php include 'menu.php'; ?>
    </div>
    <div class="content">
        <h2>Site options</h2>
        <?php if($user['admin']) : ?>
        <form id="options" method="post" style="width: 500px;">
            <div class="form-item">
                <input type="text" name="title" placeholder="Site title" value=""/>
            </div>
            <div class="form-item">
                <input type="text" name="description" placeholder="Site description" value=""/>
            </div>
            <div class="form-item">
                <button type="button" class="btn">Submit</button>
            </div>
        </form>
        <?php endif; ?>
    </div>
</div>

