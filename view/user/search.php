<?php
$title = "results";
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
    <a href="/Keysaver/dashboard" class="back">Retour</a>
        <?php if(!empty($searchData)):?>
            <h1>Trouvé : <?= count($searchData)?></h1>
            <?php foreach($searchData as $data):?>
                <div class="databox">
                    <h1>Reference : <?= strtoupper($data->reference) ;?></h1>
                    <h2>Id : <?= $data->account ;?></h2>
                    <h2>Key : <?= $data->code ;?></h2>
                    <a href="/Keysaver/edit/<?= replaceSpace($data->reference) ;?>" class="edit">Editer</a> <a href="/Keysaver/delete/<?= replaceSpace($data->reference) ;?>" class="delete">supprimer</a>
                </div>
            <?php endforeach;?>

        <?php else:?>
            <h1>Aucun résultat trouvé</h1>
        <?php endif;?>
    </div>
<?php
$content = ob_get_clean();
require 'view/layout/usertemplate.php';
?>