<section class="project-members mt-3" id="project_edit_js">

    <div class="">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?path=admin-projects-show&id=<?= $project_id ?? '' ?>">Projet</a></li>
                <li class="breadcrumb-item active" aria-current="page">Membres</li>
            </ol>
        </nav>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col" class="role">Rôle</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user->name ?></td>
                        <td><?= $user->lastname ?></td>
                        <td class="role"><?= $user->role ?></td>
                        <td id="actions">
                            <div>
                                <a href="?path=admin-users-show&id=<?= $user->id ?>&proj=<?= $project_id ?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                <form action="?path=admin-projects-del_member&id=<?= $user->id ?>" method="post">
                                    <input type="number" name="project_id" value="<?= $user->project ?>" hidden>
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-user-minus"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</section>