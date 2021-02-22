<section class="project" id="project_js">

    <div class="my-container">

        <div class="project-inner">

            <div class="inner-title">
                <div>
                    <h3>Vos tableaux</h3>
                </div>
            </div>

            <?php if (isset($message) and !empty($message)) : ?>
                <div class="toast danger left"><?= $message ?></div>
            <?php endif; ?>

            <!--ADD BTN-->

            <div class="project-inner-add ">

                <div class="project-add-btn " id="project_add_js">
                    <i class="fas fa-plus-circle project-add-js"></i>
                </div>

            </div>

            <!--PROJECT DOING-->
            <div class="project-inner-doing">

                <div class="project-title">
                    <i class="fas fa-user-clock"></i>
                    <h3>Tableau en cours d'utilisation</h3>
                </div>

                <div class="projects">

                    <?php if (isset($updated_project) && !empty($updated_project)) : ?>
                        <!--PROJECT CARD-->

                        <div class="projects-item">
                            <img src="<?= $updated_project->getPicture() ?>" alt="project bg">

                            <div class="projects-item-title " id="project_item_js_<?= $updated_project->getId() ?>">

                                <div class="projects-item-title-front">
                                    <h4><?= $updated_project->getName() ?></h4>
                                    <i class="fas fa-ellipsis-v" onclick="setEventProjectShowHover('#project_item_js_<?= $updated_project->getId() ?>')"></i>
                                </div>

                                <div class="projects-item-title-hover">
                                    <a href="?path=admin-projects-edit&id=<?= $updated_project->getId() ?>"><i class="far fa-edit"></i></a>
                                    <form action="?path=admin-projects-delete" method="POST">
                                        <input type="text" name="id" value="<?= $updated_project->getId() ?>" hidden>
                                        <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>

                            </div>

                            <a href="?path=admin-projects-show&id=<?= $updated_project->getId() ?>" class="projects-item-link"></a>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

            <!--ALL PROJECT-->
            <div class="project-inner-projects">

                <div class="project-title">
                    <i class="fas fa-business-time"></i>
                    <h3>Tous mes tableaux</h3>
                </div>

                <div class="projects">
                    <!--PROJECT CARD-->
                    <?php foreach ($projects as $project) : ?>
                        <div class="projects-item ">
                            <img src="<?= $project->getPicture() ?>" alt="project bg">

                            <div class="projects-item-title " id="project_item_js<?= $project->getId() ?>">

                                <div class="projects-item-title-front">
                                    <h4><?= $project->getName() ?></h4>
                                    <i class="fas fa-ellipsis-v" onclick="setEventProjectShowHover('#project_item_js<?= $project->getId() ?>')"></i>
                                </div>

                                <div class="projects-item-title-hover">
                                    <a href="?path=admin-projects-edit&id=<?= $project->getId() ?>"><i class="far fa-edit"></i></a>
                                    <form action="?path=admin-projects-delete" method="POST">
                                        <input type="text" name="id" value="<?= $project->getId() ?>" hidden>
                                        <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>

                            </div>

                            <a href="?path=admin-projects-show&id=<?= $project->getId() ?>" class="projects-item-link"></a>

                        </div>
                    <?php endforeach; ?>

                </div>

            </div>

            <!--ALL PROJECT WHO USER IS MEMBERS-->
            <div class="project-inner-projects">

                <div class="project-title">
                    <i class="fas fa-users"></i>
                    <h3>Projets tant que membre</h3>
                </div>

                <div class="projects">
                    <!--PROJECT CARD-->
                    <?php foreach ($projects_like_Member as $project) : ?>
                        <div class="projects-item ">
                            <img src="<?= $project->getPicture() ?>" alt="project bg">

                            <div class="projects-item-title " id="project_item_js<?= $project->getId() ?>">

                                <div class="projects-item-title-front">
                                    <h4><?= $project->getName() ?></h4>
                                    <i class="fas fa-ellipsis-v" onclick="setEventProjectShowHover('#project_item_js<?= $project->getId() ?>')"></i>
                                </div>

                                <div class="projects-item-title-hover">
                                    <a href="?path=admin-projects-show&id=<?= $project->getId() ?>"><i class="far fa-eye"></i></a>
                                </div>

                            </div>

                            <a href="?path=admin-projects-show&id=<?= $project->getId() ?>" class="projects-item-link"></a>

                        </div>
                    <?php endforeach; ?>

                </div>

            </div>

        </div>
    </div>

    <!--PROJECT ADD FORM-->
    <div class="project-add">

        <div class="project-add-new">

            <div class="inner-title">
                <div class=" inner-title-circle"></div>
                <div class="inner-title-text">
                    <h3>Création d'un tableau</h3>
                </div>
            </div>

            <div class="card">
                <form class="form-group" action="?path=admin-projects-add" method="post">

                    <div class="form-group-item">
                        <label for="project_name">Titre du projet</label>
                        <input type="text" name="project_name" id="project_name" placeholder="Titre du projet " require>
                        <span class=""></span>
                    </div>

                    <div class="form-group-item btn_group">
                        <a id="project_annuler_js">Annuler</a>
                        <button type="submit">Ajouter</button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</section>