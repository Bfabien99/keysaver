<?php
$title = "Welcome on Keysaver";
function replaceSpace($data){
    $newdata = str_replace(" ", "-", $data);
    return $newdata;
}
ob_start();
?>
    <div class="main">
    <form action="" method="POST" class="searchform">
        <input type="search" name="search" id="">
        <input type="submit" value="search" name="recherche">
    </form>
    <a href="/Keysaver/add" class="add">Ajouter</a>
        <?php if(!empty($userData)):?>
            <h1>Nombre d'enregistrement : <?= count($userData)?></h1>
            <?php foreach($userData as $data):?>
                <div class="databox">
                    <h1>Reference : <?= strtoupper($data->reference) ;?></h1>
                    <h2>Id : <?= $data->account ;?></h2>
                    <h2>Key : <?= $data->code ;?></h2>
                    <a href="/Keysaver/edit/<?= replaceSpace($data->reference) ;?>" class="edit">Editer</a> <a href="/Keysaver/delete/<?= replaceSpace($data->reference) ;?>" class="delete">supprimer</a>
                </div>
            <?php endforeach;?>
        <?php elseif(!empty($searcherror)):?>
            <?= $searcherror;?>
        <?php else:?>
            <h1>Nombre d'enregistrement : 0</h1>
        <?php endif;?>
    </div>
<?php
$content = ob_get_clean();
require 'view/layout/usertemplate.php';
?>