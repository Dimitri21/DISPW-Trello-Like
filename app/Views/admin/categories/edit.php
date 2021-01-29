
<div class="container" style="margin-top: 100px;">
    <?= $login_error;?>
    <form method="post">
        <?= $form->input('titre','titre de la Categorie');?>
        <button class="btn btn-primary">Sauvegarder</button>
    </form>
    <a href="index.php?p=admin.categories.index" class="btn btn-info">Annuller</a>

</div>

