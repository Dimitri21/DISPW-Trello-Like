<section class="dashboard">
    <!--CONTENT-->
    <div class="dashboard-inner" id="dashboard_inner_js">

        <!--CONTENT-->
        <div class="dashboard-inner-content" id="dashboard_inner_content_js">

            <!--PROJECT TITLE-->
            <div class="dashboard-inner-content-title">
                <h2><?= $project->getName()  ?></h2>
                <span id="member_add_js"><i class="far fa-user-plus"></i></span>
                <span id="list_add_js"><i class="far fa-plus"></i></span>
            </div>

            <!--PROJECT CONTENT-->
            <div class="dashboard-inner-content-lists">

                <div class="dashboard-inner-content-lists-item">

                    <div class="project-list" id="tasks_js" style="grid-template-columns: repeat(<?= count($lists) ?? 3 ?>, 300px);">
                        <?php foreach ($lists as $list) : ?>

                            <!--TASK-->
                            <div class="project-list-tasks">

                                <!--TASK-->
                                <div class="project-list-tasks-task">

                                    <!--LIST TITLE-->
                                    <div class="project-list-tasks-task-title">

                                        <span class="project-list-tasks-task-title-js" id="list-<?= $list->getId() ?>"><?= $list->getName() ?></span>

                                        <div class="project-list-tasks-task-title-right">

                                            <!--Task number-->
                                            <div>
                                                <i class="far fa-clipboard-list"></i>
                                                <span class="nb_task_js" id="nb_task_js_<?= $list->getId() ?>"><?= count($list->getTasks()) ?></span>
                                            </div>

                                            <!--//TODO event for btn-todo-->
                                            <div>
                                                <button onclick="showAddTaskForm(<?= $list->getId() ?>)" class="project-list-title-right-add" id="add-<?= $list->getId() ?>">
                                                    <i class="far fa-plus"></i>
                                                </button>

                                                <!--//TODO event for btn-todo-->
                                                <a href="?path=admin-lists-edit&id=<?= $list->getId() ?>"><i class="fas fa-tools"></i></a>

                                            </div>
                                        </div>
                                    </div>

                                    <!--LIST BODY-->
                                    <div class="project-list-tasks-task-body " id="tasks_container_js_<?= $list->getId() ?>" data-list="<?= $list->getId() ?>" data-project="<?= $project->getId() ?>">
                                        <!--BACKLOG-->
                                        <?php foreach ($list->getTasks() as $task) : ?>
                                            <div class="project-list-tasks-task-body-task <?= $task->getStickerObj()->getName() ?>" id="draggable_element_<?= $task->getId() ?>" draggable="true" data-task="<?= $task->getId() ?>">

                                                <div class="project-list-tasks-task-body-task-front">
                                                    <!--TASK TITLE-->
                                                    <p class="project-list-tasks-task-body-task-front-title">
                                                        <i class="fal fa-book-open"></i>
                                                        <span class="task-title"><?= $task->getName() ?></span>
                                                    </p>

                                                    <!--TASK LEAD-->
                                                    <div class="project-list-tasks-task-body-task-front-lead">
                                                        <div class="project-list-tasks-task-body-task-front-lead-picture">
                                                            <img src="images/profile/<?= $task->getCreatedByObj()->getPicture() ?? 'default/man.jpg' ?>" alt="user profile avatar">
                                                        </div>
                                                        <span><?= $task->getCreator() ?></span>
                                                    </div>

                                                    <!--TASK STATE-->
                                                    <div class="project-list-tasks-task-body-task-front-state">
                                                        <span>Etat</span>

                                                        <span>
                                                            <span></span>
                                                            <span><?= $task->getStickerObj()->getName() ?></span>
                                                        </span>

                                                    </div>

                                                    <!--TASK MEMBERS-->
                                                    <!--TODO loop for printing members of this task-->
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
                                                    <a href="?path=admin-tasks-edit&id=<?= $task->getId() ?>&proj=<?= $project->getId() ?>"><i class="far fa-edit"></i></a>
                                                    <!--On delete call js function with a decision-->
                                                    <!--onsubmit="confirm('Etes-vous de vouloir supprimer cette tâche?')"-->
                                                    <form action="?path=admin-tasks-delete" method="POST">
                                                        <input type="text" name="task_id" value="<?= $task->getId() ?>" hidden>
                                                        <input type="text" name="project_id" value="<?= $project->getId() ?>" hidden>
                                                        <button class="btn btn-danger" type="submit">
                                                            <i class="far fa-trash-alt"></i>
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

</section>