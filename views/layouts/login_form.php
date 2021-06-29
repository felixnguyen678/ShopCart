<div class="well">
    <h5>LOGIN</h5>
    <form method="POST" action="/controllers/login_controller.php">
        <div class="control-group">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
                <input name="email" class="span3"  type="text" placeholder="Email">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
                <input name="password" type="password" class="span3" placeholder="Password">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="defaultBtn">Sign in</button>
            </div>
        </div>
    </form>
</div>
