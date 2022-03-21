<?php
$title = "Welcome on Keysaver";
ob_start();
?>
    
    <div class="presentation">
        <div class="text">
            <h1 class="title">You need to save all your confidential password ?</h1>
            <div>
            <p>With keysaver manage all your password everywhere you are.</p>
            <p>Login and in you personal page you can show all you password you saved!</p>
            <p>Keep you password save, because we use new technologies that make your all your informations impossible to be decrypted</p>
            <p>Just login and you can manage you account.</p>
            <p><span class="special">Save, Delete, Update..</span> All depend on you!</p>
            <p>Your password are so strongly encrypt that we can't reverse the process, so we don't know you password too.</p>
            <p>You are the one who know you password</p>
            </div>
            <br>
            <h2 class="title">You don't have an account ?</h2>
            <p>Good news, just signup and join us.</p>
        </div>
        <div class="imgbox">
            
        </div>
    </div>

        <form action="" method="post" id="loginbox">
            <h1>Login Form</h1>
            <div class="group">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" placeholder="your pseudonyme">
            </div>

            <div class="group">
                <label for="password">password</label>
                <input type="password" name="password" placeholder="your password">
            </div>
            <input type="submit" value="Connect" name="login" class="connect">
            <?php if (!empty($err)) {
                echo $err;
            }?>
            <?php if (!empty($msg)) {
                echo $msg;
            }?>
        </form>
<?php
$content = ob_get_clean();
require 'layout/template.php';
?>