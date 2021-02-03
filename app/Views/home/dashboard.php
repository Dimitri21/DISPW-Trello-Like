<section class="dashboard">

    <!--NAVBAR-->
    <div class="dashboard-nav">
        <!--SITE LOGO-->
        <div class="dashboard-left">
            <img src="images/logo/sprinto.svg" alt="logo of website">
        </div>

        <div class="dashboard-right">

            <!--BREADCRUMB-->
            <ul class="dashboard-right-breadcrumb">
                <li class="dashboard-right-breadcrumb-item"><a href="#">Project</a></li>
                <li class="dashboard-right-breadcrumb-item "><a href="#">List</a></li>
                <li class="dashboard-right-breadcrumb-item active">Task</li>
            </ul>

            <!--PROFILE INFOS-->
            <ul class="dashboard-right-profile">

                <!--TODO to delete-->
                <li class="dashboard-right-profile-item">
                    <a href="#"><i class="fal fa-search"></i></a>
                </li>

                <!--TODO to delete-->
                <li class="dashboard-right-profile-item">
                    <a href="#"><i class="fal fa-envelope"></i></a>
                    <span class="badge"></span>3</span>
                </li>

                <li class="dashboard-right-profile-item">
                    <a href="#"><i class="fal fa-flag"></i></a>
                    <span class="badge">1</span>
                </li>

                <li class="dashboard-right-profile-item">
                    <a href="#"><i class="fal fa-bell"></i></a>
                    <span class="badge">2</span>
                </li>

                <li class="dashboard-right-profile-item">

                    <!--USER PICTURE-->
                    <a href="#">
                        <img src="images/profile/photo_passe.jpg" alt="profile picture">
                    </a>

                    <a href="#">
                        <i class="fal fa-user-circle"></i>
                    </a>

                    <!--DROPDOWN-->
                    <div class="dashboard-right-profile-dropdown">
                        <ul>
                            <li><a href="/user-parametre">Parametre</a></li>
                            <li><a href="/profile">Profile</a></li>
                            <li><a href="/deconnexion">Deconnection</a></li>
                        </ul>
                    </div>

                </li>
            </ul>

        </div>

    </div>

    <!--CONTENT-->
    <div class="dashboard-inner">

        <!--ASIDE BAR-->
        <div class="dashboard-inner-aside">

            <nav class="dashboard-inner-aside-list">
                <li>
                    <i class="fas fa-tools"></i>
                    <a href="#">Tableau</a>
                </li>
                <li>
                    <i class="fas fa-clipboard"></i>
                    <a href="#">Membres</a>
                </li>
                <li>
                    <i class="fas fa-address-card"></i>
                    <a href="#">Listes</a>
                </li>
                <li>
                    <i class="fab fa-gitlab"></i>
                    <a href="#">Tâches</a>
                </li>
            </nav>

            <!--SETTING ON BOTTOM-->
            <div class="dashboard-inner-aside-tools">
                <a href="#">
                    <i class="fal fa-cog"></i>
                    <span>Project settings</span>
                    <i class="fal fa-chevron-double-left"></i>
                </a>
            </div>

        </div>

        <!--CONTENT-->
        <div class="dashboard-inner-content">

            <!--PROJECT TITLE-->
            <div class="dashboard-inner-content-title">
                <h2>Tableau Création de site </h2>
                <p><i class="fal fa-filter"></i></p>
            </div>

            <!--PROJECT CONTENT-->
            <div class="dashboard-inner-content-lists">

                <div class="dashboard-inner-content-lists-item">

                    <div class="project-list">

                        <!--TITLE-->
                        <div class="project-list-title">
                            <span>A faire</span>

                            <div class="project-list-title-right">
                                <i class="far fa-clipboard-list"></i>
                                <span>/2</span>
                                <button class="project-list-title-right-add">
                                    <i class="far fa-plus"></i>
                                </button>
                                <button class="project-list-title-right-add">
                                    <i class="fas fa-tools"></i>
                                </button>
                            </div>

                        </div>

                        <!--ADD-->
                        <div class="project-list-add">
                            <i class="far fa-plus"></i>
                        </div>

                        <!--LISK TODO-->
                        <div class="project-list-tasks todo">

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task prop ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task active ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!--LISK DOING-->
                        <div class="project-list-tasks doing">

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task prop ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task active ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!--LISK TEST-->
                        <div class="project-list-tasks test">

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task prop ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task active ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <!--LISK INCREMENT-->
                        <div class="project-list-tasks increment">

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task prop ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task active ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <!--LISK CLOSED-->
                        <div class="project-list-tasks closed">

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task prop ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                            <!--LISK TASK-->
                            <div class="project-list-tasks-task active ">

                                <!--TASK TITLE-->
                                <p class="project-list-tasks-item-title">
                                    <i class="fal fa-heading"></i>
                                    <span>Faire la bare de navigation</span>
                                </p>

                                <!--TASK LEAD-->
                                <div class="project-list-tasks-item-lead">
                                    <img src="images/profile/photo_passe.jpg" alt="user profile avatar">
                                    <span>John DOE</span>
                                </div>

                                <!--TASK STATE-->
                                <div class="project-list-tasks-item-state">
                                    <span>Etat</span>
                                    <span>
                                        <span></span>
                                        <span>Proposée</span>
                                    </span>
                                </div>

                                <!--TASK MEMBERS-->
                                <div class="project-list-tasks-item-members">
                                    <div class="project-list-tasks-item-members-item success">
                                        <span>Jean D.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item danger">
                                        <span>Pierre P.</span>
                                    </div>
                                    <div class="project-list-tasks-item-members-item primary">
                                        <span>Pierre P.</span>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>