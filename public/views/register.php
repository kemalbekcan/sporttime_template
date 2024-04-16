<form name="frmUser" method="post" action="">
    <div class="message text-center"><?php if($message!="") { echo $message; } ?></div>

    <h1 class="text-center">Login</h1>

    <div>
        <div class="row">
            <label> Username </label> <input type="text" name="userName"
                class="full-width" " required>
        </div>
        <div class="row">
            <label>Password</label> <input type="password"
                name="password" class="full-width" required>
        </div>
        <div class="row">
            <input type="submit" name="submit" value="Submit"
                class="full-width ">
        </div>
    </div>
</form>