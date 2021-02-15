<section class="dashboard">
    <!--CONTENT-->
    <div class="dashboard-inner" id="dashboard_inner_js">

        <!--ASIDE BAR-->
        <div class="dashboard-inner-aside">

            <nav class="dashboard-inner-aside-list">

                <li class="projects" data-url="/projects-index">
                    <a href="/admin-projects-index">
                        <i class="fas fa-tools"></i> <span>Tableau</span>
                    </a>
                </li>

                <li class="members" data-url="/members-index">
                    <a href="#">
                        <i class="fas fa-clipboard"></i> <span>Membres</span>
                    </a>
                </li>

                <li class="lists" data-url="/lists-index">
                    <a href="#">
                        <i class="fas fa-address-card"></i> <span>Listes</span>
                    </a>
                </li>

                <li class="tasks" data-url="/tasks-index">
                    <a href="#">
                        <i class="fab fa-gitlab"></i> <span>Tâches</span>
                    </a>
                </li>

            </nav>

            <!--SETTING ON BOTTOM-->
            <div class="dashboard-inner-aside-tools">
                <div>
                    <i class="fal fa-cog"></i>
                    <span>Project settings</span>
                </div>
                <i class="fal fa-chevron-double-left" id="setting_chevron_js"></i>
            </div>

        </div>

        <!--CONTENT-->
        <div class="dashboard-inner-content" id="dashboard_inner_content_js">

            <!--PROJECT TITLE-->
            <div class="dashboard-inner-content-title">
                <h2><?= $project->getName()  ?></h2>
                <span id="list_add_js"><i class="far fa-plus"></i></span>
            </div>

            <!--PROJECT CONTENT-->
            <div class="dashboard-inner-content-lists">

                <div class="dashboard-inner-content-lists-item">

                    <div class="project-list" id="tasks_js">
                        <?php foreach ($lists as $list) : ?>

                            <!--TASK-->
                            <div class="project-list-tasks">
                                <!--TASK-->
                                <div class="project-list-tasks-task">

                                    <!--LIST TITLE-->
                                    <div class="project-list-tasks-task-title">

                                        <span class="project-list-tasks-task-title-js" id="list-<?= $list->getId() ?>"><?= $list->getName() ?></span>

                                        <div class="project-list-tasks-task-title-right">

                                            <div>
                                                <i class="far fa-clipboard-list"></i>
                                                <span class="nb_task_js" id="nb_task_js_<?= $list->getId() ?>"><?= count($list->getTasks()) ?></span>
                                            </div>

                                            <!--//TODO event for btn-todo-->
                                            <button onclick="showAddTaskForm(<?= $list->getId() ?>)" class="project-list-title-right-add" id="add-<?= $list->getId() ?>">
                                                <i class="far fa-plus"></i>
                                            </button>

                                            <!--//TODO event for btn-todo-->
                                            <button onclick="listConfigEvent('list-<?= $list->getId() ?>')" class="project-list-title-right-config" id="config-<?= $list->getId() ?>">
                                                <i class="fas fa-tools"></i>
                                            </button>

                                        </div>
                                    </div>

                                    <!--LIST BODY-->
                                    <div class="project-list-tasks-task-body" id="tasks_container_js_<?= $list->getId() ?>">
                                        <!--BACKLOG-->
                                        <?php foreach ($list->getTasks() as $task) : ?>
                                            <div class="project-list-tasks-task-body-task">

                                                <div class="project-list-tasks-task-body-task-front">
                                                    <!--TASK TITLE-->
                                                    <p class="project-list-tasks-task-body-task-front-title">
                                                        <i class="fal fa-book-open"></i>
                                                        <span class="task-title"><?= $task->getName() ?></span>
                                                    </p>

                                                    <!--TASK LEAD-->
                                                    <div class="project-list-tasks-task-body-task-front-lead">
                                                        <div class="project-list-tasks-task-body-task-front-lead-picture">
                                                            <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                                        </div>
                                                        <span><?= $task->getCreator() ?></span>
                                                    </div>

                                                    <!--TASK STATE-->
                                                    <div class="project-list-tasks-task-body-task-front-state">
                                                        <span>Etat</span>

                                                        <span>
                                                            <span></span>
                                                            <span><?= $task->getStickerString() ?></span>
                                                        </span>

                                                    </div>

                                                    <!--TASK MEMBERS-->
                                                    <div class="project-list-tasks-task-body-task-front-members">

                                                        <div class="project-list-tasks-task-body-task-front-members-item success">
                                                            <span>Jean D.</span>
                                                        </div>

                                                        <div class="project-list-tasks-task-body-task-front-members-item danger">
                                                            <span>Pierre P.</span>
                                                        </div>

                                                        <div class="project-list-tasks-task-body-task-front-members-item primary">
                                                            <span>Pierre P.</span>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="project-list-tasks-task-body-task-hover">
                                                    <a href="/admin-tasks-edit&id=<?= $task->getId() ?>"><i class="far fa-edit"></i></a>
                                                    <form action="/admin-task-delete">
                                                        <input type="text" name="id" value="<?= $task->getId() ?>" hidden>
                                                        <button class="btn btn-danger" type="submit">
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="dashboard-list">
        <!--ADD NEW LIST-->
        <div class="dashboard-list-add">

            <div class="dashboard-list-add-title">
                <h4>Ajouter une liste</h4>
                <i class="fal fa-times" id="list_add_close_js"></i>
            </div>

            <div class="dashboard-list-add-form">
                <!--TODO to correct the class name typing mistake-->
                <form method="get" id="dashboard-list-add-form" data-url="/admin-lists-addAjax&id=<?= $project->getId() ?>" class="projecr_list_add_js">
                    <input type="text" name="listname" id="listname" placeholder="Nom de la tâche" maxlength="20" minlength="3">
                    <textarea name="description" id="description" cols="15" rows="5" placeholder="Description"></textarea>

                    <button type="submit" id="">Ajouter</button>
                </form>

            </div>

        </div>
    </div>

    <!--CONFIG NEW TASK-->
    <div class="dashboard-task">

        <div class="dashboard-task-add">

            <div class="dashboard-task-add-title">
                <h4>Ajouter une tâche</h4>
                <i class="fal fa-times" id="task_add_close_js"></i>
            </div>

            <div class="dashboard-task-add-form">

                <div class="card">
                    <form id="dashboard-task-add-form" class="form-group project_list_task_add_js" data-url="/admin-tasks-addAjax&id=" method="post">

                        <div class="form-group-item">
                            <label for="task_name">Titre</label>
                            <input type="text" name="task_name" id="task_name" placeholder="Votre titre">
                            <span class=""></span>
                        </div>

                        <div class="form-group-item">
                            <label for="taskdescription">Description</label>
                            <textarea name="description" id="taskdescription" cols="15" rows="5" placeholder="Description de la tâche"></textarea>
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
    </div>

</section>