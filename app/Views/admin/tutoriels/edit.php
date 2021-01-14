<?php


?>

<div class="container" style="margin-top: 100px;">
    <?= $login_error;?>
    <form method="post">
        <?= $form->input('title','titre de l\'article');?>
        <?= $form->input('link','Video youtube en iframe',["type"=>"textarea"]);?>
        <?= $form->input('updateDate','Date de modification');?>
        <?= $form->select('module','Module',$modules);?>
        <?= $form->select('auteur','Auteur',$auteurs);?>

        <button class="btn btn-primary">Sauvegarder</button>
    </form>
    <a href="index.php?p=admin.tutoriels.index" class="btn btn-info">Annuller</a>

</div>

