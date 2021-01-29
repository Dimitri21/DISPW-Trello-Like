
<h1>Administrer les categories </h1>
<div class="Ajouter" style="margin: 10px 0px;">
    <a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
</div>
<table class="table">

    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $post) :?>
            <tr>
                <td><?= $post->id;?></td>
                <td><?= $post->titre?></td>
                <td>
                    <div class="row">
                        <a href="?p=admin.categories.edit&id=<?= $post->id; ?>" class="btn btn-primary">Editer</a>
                        <form action="?p=admin.categories.delete" method="post">
                            <input type="hidden" name="id" value="<?= $post->id;?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <!--<a href="?p=posts.view&id=<?= $post->id; ?>" class="btn btn-info">Voir</a>-->

                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>