<?php
$title = "Edit";
function replaceSpace($data){
    $newdata = str_replace(" ", "-", $data);
    return $newdata;
}
ob_start();
?>
    <div class="main">
        <a href="/Keysaver/dashboard" class="back">Retour</a>
        <?php if(!empty($getData)):?>
            <form action="" method="post" class="editform">
                <div class="group">
                    <label for="reference">Reference</label>
                    <input type="text" name="reference" value="<?= $getData->reference ;?>">
                </div>
                <div class="group">
                    <label for="account">Account or Identifiant</label>
                    <input type="text" name="account" value="<?= $getData->account ;?>">
                </div>
                <div class="group">
                    <label for="key" id="keylabel">Key
                    <input type="password" name="password" value="<?= $getData->code ;?>" id="password"><img src="assets/images/icone/icons8-visible-50.png" alt="voir" id="eye" width="20px" height="20px"></label>
                </div>

                <input type="submit" value="modifier" name="enregistrer">

                <?php if (!empty($err)) {
                    echo $err;
                }?>
                <?php if (!empty($msg)) {
                    echo $msg;
                }?>

            </form>

        <?php else:?>

            <h2>Sorry, unknow value</h2>

        <?php endif;?>

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