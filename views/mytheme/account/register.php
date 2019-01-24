<div class="container">
    <h1 class="title"><?= $page_title; ?></h1>
    <form method="POST" id="register">
        <div class="form-item">
            <input type="text" name="login" placeholder="Enter login" >
        </div>
        <div class="form-item">
            <input type="password" name="password1" placeholder="Enter password" >
        </div>
        <div class="form-item">
            <input type="password" name="password2" placeholder="Repeat password" >
        </div>
        <div class="form-item">
            <button type="button" name="register" value="submit" class="btn" >Register</button>
        </div>
        <div id="result"></div>
    </form>
</div>
