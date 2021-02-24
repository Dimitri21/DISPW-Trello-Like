<section class="project-edit mt-3" id="project_edit_js">

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?path=admin-projects-show&id=<?= $project_id ?? '' ?>">Projet</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listes</li>
            </ol>
        </nav>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lists as $list) : ?>
                    <tr>
                        <td><?= $list->getName() ?></td>
                        <td><?= $list->getDescription() ?></td>
                        <td id="list_actions">
                            <a href="?path=admin-lists-edit&id=<?= $list->getId() ?>" class="btn btn-primary">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="?path=admin-lists-delete&id=<?= $list->getId() ?>&proj=<?= $list->getProject() ?>" class="btn btn-danger">
                                <i class="far fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</section>