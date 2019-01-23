<div class="content">
    <h1 class="title"><?= $page_title; ?></h1>
    <form method="POST" id="login">
        <div class="form-item">
            <input type="text" name="login" placeholder="Enter login"/>
        </div>
        <div class="form-item">
            <input type="password" name="password" placeholder="Enter password"/>
        </div>
        <div class="form-item">
            <button type="button" name="log_in" value="submit" class="btn">Login</button>
        </div>
        <div id="result"></div>
    </form>
    <a class="reg" href="/account/register">Register</a>
</div>
