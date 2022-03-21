<?php
$title = "Add new key";
ob_start();
?>
    <a href="/Keysaver/dashboard" class="back">Retour</a>
    <div class="main">
        
        <form action="" method="post" class="addform">
            <div class="group">
                <label for="reference">Reference</label>
                <input type="text" name="reference" placeholder="eg: mon compte pour acceder au site aa.fr">
            </div>
            <div class="group">
                <label for="account">Account or Identifiant</label>
                <input type="text" name="account">
            </div>
            <div class="group">
            <label for="key" id="keylabel">Key
                    <input type="password" name="password" id="password"><img src="assets/images/icone/icons8-visible-50.png" alt="voir" id="eye" width="20px" height="20px"></label>
            </div>
            <input type="submit" value="enregistrer" name="enregistrer">
            <?php if (!empty($err)) {
                echo $err;
            }?>
            <?php if (!empty($msg)) {
                echo $msg;
            }?>
        </form>
    </div>
    <script>
        let see = document.getElementById('eye');
        let password = document.getElementById('password');
        see.addEventListener('click',function(){
            if(password.type =='password'){
                password.type ='text'
                see.src = 'assets/images/icone/icons8-cacher-50.png'
            }else{
                password.type ='password'
                see.src = 'assets/images/icone/icons8-visible-50.png'
            }
        })
    </script>
<?php
$content = ob_get_clean();
require 'view/layout/usertemplate.php';
?>