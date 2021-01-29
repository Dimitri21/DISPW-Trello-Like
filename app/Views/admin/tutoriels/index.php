

<div class="container">

    <div class="row">
        <h1 align="center" style="color:#fff;">Administration des Cours </h1>

        <div class="row">
            <div class="col col-md-12 Ajouter" style="margin: 10px 0px;">
                <a href="?p=admin.tutoriels.add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter</a>
            </div>
        <div class="col-md-10">
            <table class="table table-sm">

                        <thead>
                        <tr bgcolor="#f0f8ff">
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Date Regis</th>
                            <th>Date Modif</th>
                            <th>Module</th>
                            <th>Auteur</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($tutoriels as $post) :?>
                            <tr style="color: white;">
                                <td><?= $post->id_tuto;?></td>
                                <td><?= $post->title;?></td>
                                <td><?= substr($post->recorddate, 0, 11) ;?></td>
                                <td><?= substr($post->updatedate, 0, 11) ;?></td>
                                <td><?= $post->module;?></td>
                                <td><?= $post->auteur;?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <a href="?p=admin.tutoriels.edit&id=<?= $post->id_tuto; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <form action="?p=admin.tutoriels.delete" method="post">
                                                <input type="hidden" name="id" value="<?= $post->id_tuto;?>">
                                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>

        </div>

        <div class="col-md-2">
            <div class="row">
                <div class="">
                    <ul class="list-group">
                    <?php foreach ($nb_tutorials_by_module as $item) :?>
                            <li class="list-group-item justify-content-between">
                                <a href="?p=admin.tutoriels.index&module=<?= $item->module;?>"><?= $item->module;?></a>
                                <span class="badge badge-default badge-pill"><?=$item->nb_videos ?></span>
                            </li>

                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>
