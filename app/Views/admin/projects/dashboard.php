<section class="dashboard">
    <!--CONTENT-->
    <div class="dashboard-inner" id="dashboard_inner_js">

        <!--ASIDE BAR-->
        <div class="dashboard-inner-aside">

            <nav class="dashboard-inner-aside-list">

                <li class="projects" data-url="/projects-index">
                    <a href="/admin.project.tableau">
                        <i class="fas fa-tools"></i> <span>Tableau</span>
                    </a>
                </li>

                <li class="members" data-url="/members-index">
                    <a href="/admin.project.members">
                        <i class="fas fa-clipboard"></i> <span>Membres</span>
                    </a>
                </li>

                <li class="lists" data-url="/lists-index">
                    <a href="/admin.project.list">
                        <i class="fas fa-address-card"></i> <span>Listes</span>
                    </a>
                </li>

                <li class="tasks" data-url="/tasks-index">
                    <a href="/admin.project.task">
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
                <h2>Tableau Création de site </h2>
                <span id="list_add_js"><i class="far fa-plus"></i></span>
            </div>

            <!--PROJECT CONTENT-->
            <div class="dashboard-inner-content-lists">

                <div class="dashboard-inner-content-lists-item">

                    <div class="project-list" id="tasks_js">

                        <!--TASK TODO-->
                        <div class="project-list-tasks todo">
                            <!--TASK-->
                            <div class="project-list-tasks-task">

                                <!--LIST TITLE-->
                                <div class="project-list-tasks-task-title">
                                    <span class="project-list-tasks-task-title-js" id="list-1">A faire</span>

                                    <div class="project-list-tasks-task-title-right">

                                        <div>
                                            <i class="far fa-clipboard-list"></i>
                                            <span class="nb_task_js">1</span>
                                        </div>

                                        <!--//TODO event for btn-dodo-->
                                        <button onclick="showAddTaskForm(1)" class="project-list-title-right-add" id="add-1">
                                            <i class="far fa-plus"></i>
                                        </button>

                                        <!--//TODO event for btn-dodo-->
                                        <button onclick="listConfigEvent('list-1')" class="project-list-title-right-config" id="config-1">
                                            <i class="fas fa-tools"></i>
                                        </button>

                                    </div>
                                </div>

                                <!--LIST BODY-->
                                <div class="project-list-tasks-task-body" id="tasks_container_js_1">

                                    <!--BACKLOG-->
                                    <div class="project-list-tasks-task-body-task">

                                        <!--TASK TITLE-->
                                        <p class="project-list-tasks-task-body-task-title">
                                            <i class="fal fa-book-open"></i>
                                            <span class="task-title">Faire la bare de navigation</span>
                                        </p>

                                        <!--TASK LEAD-->
                                        <div class="project-list-tasks-task-body-task-lead">
                                            <div class="project-list-tasks-task-body-task-lead-picture">
                                                <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                            </div>
                                            <span>John DOE</span>
                                        </div>

                                        <!--TASK STATE-->
                                        <div class="project-list-tasks-task-body-task-state">
                                            <span>Etat</span>

                                            <span>
                                                <span></span>
                                                <span>Proposée</span>
                                            </span>

                                        </div>

                                        <!--TASK MEMBERS-->
                                        <div class="project-list-tasks-task-body-task-members">

                                            <div class="project-list-tasks-task-body-task-members-item success">
                                                <span>Jean D.</span>
                                            </div>

                                            <div class="project-list-tasks-task-body-task-members-item danger">
                                                <span>Pierre P.</span>
                                            </div>

                                            <div class="project-list-tasks-task-body-task-members-item primary">
                                                <span>Pierre P.</span>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!--TASK DOING-->
                        <div class="project-list-tasks doing">
                            <!--TASK-->
                            <div class="project-list-tasks-task">

                                <!--LIST TITLE-->
                                <div class="project-list-tasks-task-title">
                                    <span class="project-list-tasks-task-title-js" id="list-2">Encours</span>

                                    <div class="project-list-tasks-task-title-right">

                                        <div>
                                            <i class="far fa-clipboard-list"></i>
                                            <span class="nb_task_js">0</span>
                                        </div>

                                        <!--//TODO event for btn-dodo-->
                                        <button onclick="showAddTaskForm(2)" class="project-list-title-right-add" id="add-2">
                                            <i class="far fa-plus"></i>
                                        </button>

                                        <!--//TODO event for btn-dodo-->
                                        <button onclick="listConfigEvent('list-2')" class="project-list-title-right-config" id="config-2">
                                            <i class="fas fa-tools"></i>
                                        </button>

                                    </div>
                                </div>

                                <!--LIST BODY-->
                                <div class="project-list-tasks-task-body" id="tasks_container_js_2">
                                </div>

                            </div>

                        </div>

                        <!--TASK CLOSE-->
                        <div class="project-list-tasks close">
                            <!--TASK-->
                            <div class="project-list-tasks-task">

                                <!--LIST TITLE-->
                                <div class="project-list-tasks-task-title">
                                    <span class="project-list-tasks-task-title-js" id="list-3">Terminé</span>

                                    <div class="project-list-tasks-task-title-right">

                                        <div>
                                            <i class="far fa-clipboard-list"></i>
                                            <span class="nb_task_js">0</span>
                                        </div>

                                        <!--//TODO event for btn-dodo-->
                                        <button onclick="showAddTaskForm(3)" class="project-list-title-right-add" id="add-3">
                                            <i class="far fa-plus"></i>
                                        </button>

                                        <!--//TODO event for btn-dodo-->
                                        <button onclick="listConfigEvent('list-3')" class="project-list-title-right-config" id="config-3">
                                            <i class="fas fa-tools"></i>
                                        </button>

                                    </div>
                                </div>

                                <!--LIST BODY-->
                                <div class="project-list-tasks-task-body" id="tasks_container_js_3">

                                </div>

                            </div>

                        </div>


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

                <form method="get" id="dashboard-list-add-form">
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

                <form method="get" id="dashboard-task-add-form">
                    <input type="text" name="taskname" id="taskname" placeholder="Nom de la tâche" maxlength="20" minlength="3">
                    <textarea name="description" id="taskdescription" cols="15" rows="5" placeholder="Description de la tâche"></textarea>

                    <button type="submit">Ajouter</button>
                </form>

            </div>

        </div>
    </div>

</section>