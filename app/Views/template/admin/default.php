<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">

    <!--BOOTSTRAP-->
    <?php if (isset($bootstrap)) : ?>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <?php endif; ?>
    <!--CDN AREA-->

    <!--STYLES-->
    <link rel="stylesheet" href="build/css/app.css">

    <!--META AREA-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="trello like">
    <meta name="authors" content="CECILE E., DIMITRI H. ET DURAMANA K.">

    <!--SCRIPT FOR LLOTTIES-->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!--FONT AWESOME PRO -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title><?= \app\App::getInstance()->titre ?></title>
</head>

<body>
    <main class="main">

        <!--NAVBAR AREA-->
        <nav class="my-navbar">
            <div class="my-container">

                <div class="my-navbar-inner">

                    <!--NAVBAR LOGO-->
                    <div class="my-navbar-inner-logo">
                        <a href="?path=home">
                            <img src="images/logo/sprinto_white.png" alt="Logo de sprinto">
                        </a>
                    </div>

                    <!--NAVBAR LIST ITEMS-->

                    <ul class="my-navbar-inner-list">

                        <li class="my-navbar-inner-list-item">
                            <a href="?path=home">ACCUEIL</a>
                        </li>

                        <?php if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) : ?>
                            <!--PROFILE INFOS-->
                            <ul class="my-navbar-inner-list-profile">

                                <!--TODO to delete-->
                                <?php if (isset($project)) : ?>

                                    <?php if (isset($project_message) && !empty($project_message)) : ?>
                                        <li class="my-navbar-inner-list-profile-item">
                                            <a href="#"><i class="fal fa-envelope"></i></a>
                                            <span class="badge success"><?= $project_message ?></span>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (isset($out_date) && !empty($out_date)) : ?>
                                        <li class="my-navbar-inner-list-profile-item">
                                            <a href="#"><i class="fal fa-flag"></i></a>
                                            <span class="badge danger"><?= $out_date ?></span>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (isset($warning_date) && !empty($warning_date)) : ?>
                                        <li class="my-navbar-inner-list-profile-item">
                                            <a href="#"><i class="fal fa-bell"></i></a>
                                            <span class="badge warning"><?= $warning_date ?></span>
                                        </li>
                                    <?php endif; ?>


                                <?php endif; ?>

                                <li class="my-navbar-inner-list-profile-item profil">
                                    <!--USER PICTURE-->
                                    <div href="#" class="profile-image" id="dropdown_js">
                                        <img src="images/profile/<?= \app\App::getInstance()->picture ?? 'default/man.jpg' ?>" alt="profile picture">
                                    </div>

                                </li>

                            </ul>
                        <?php else : ?>
                            <li class="my-navbar-inner-list-item">
                                <a href="?path=connexion">Connexion</a>
                            </li>

                            <li class="my-navbar-inner-list-item">
                                <a href="?path=inscription">Inscription</a>
                            </li>
                        <?php endif; ?>

                    </ul>

                    <!--HUMBURGER-->
                    <div class="my-navbar-inner-humburger nav-humburger-js">
                        <span></span>
                    </div>

                </div>

            </div>
        </nav>

        <!--DROPDOWN-->
        <?php if (isset($_SESSION['auth'])) : ?>
            <div class="my-container">
                <div class="main-dropdown" id="profile_dropdown_js">
                    <ul>
                        <li><a href="?path=admin-projects-index">Dashboard</a></li>
                        <li><a href="?path=admin-users-profile">Profil</a></li>
                        <li><a href="?path=auth-logout">Déconnexion</a></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <!--CONTENT AREA-->
        <section role="main" class="container">
            <!-- L'ensemble de contenu envoyé par le serveur PHP -->

            <section class="dashboard">

                <!--CONTENT-->
                <div class="dashboard-inner" id="dashboard_inner_js">

                    <!--ASIDE BAR-->
                    <div class="dashboard-inner-aside">

                        <nav class="dashboard-inner-aside-list">

                            <li class="projects" data-url="?path=projects-index">
                                <a href="?path=admin-projects-index">
                                    <i class="fas fa-tools"></i> <span>Tableau</span>
                                </a>
                            </li>

                            <li class="members" data-url="?path=members-index">
                                <a href="?path=admin-projects-members&id=<?= $project->getId() ?>">
                                    <i class="fas fa-clipboard"></i> <span>Membres</span>
                                </a>
                            </li>

                            <li class="lists" data-url="?path=lists-index">
                                <a href="?path=admin-projects-lists&id=<?= $project->getId() ?>">
                                    <i class="fas fa-address-card"></i> <span>Listes</span>
                                </a>
                            </li>


                        </nav>

                        <!--SETTING ON BOTTOM-->
                        <div class="dashboard-inner-aside-tools">
                            <div>
                                <i class="fal fa-cog"></i>
                                <span>Personnalisation</span>
                            </div>
                            <i class="fal fa-chevron-double-left" id="setting_chevron_js"></i>
                        </div>

                    </div>

                    <section class="dashboard-inner-content">
                        <?= $content ?? '' ?>
                    </section>

                </div>

                <!--ADD NEW LIST-->
                <div class="dashboard-list">
                    <div class="dashboard-list-add">

                        <div class="dashboard-list-add-title">
                            <h4>Ajouter une liste</h4>
                            <i class="fal fa-times" id="list_add_close_js"></i>
                        </div>

                        <div class="dashboard-list-add-form">
                            <div class="global-form-bg">
                                <!--TODO to correct the class name typing mistake-->
                                <form class="form-group projecr_list_add_js" method="get" id="dashboard-list-add-form" data-url="?path=admin-lists-addAjax&id=<?= $project->getId() ?>">

                                    <div class="form-group-item">
                                        <label for="listname">Nom</label>
                                        <input type="text" name="listname" id="listname" placeholder="Nom de la tâche" maxlength="20" minlength="3">
                                        <span class=""></span>
                                    </div>

                                    <div class="form-group-item">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="15" rows="5" placeholder="Description"></textarea>
                                        <span class=""></span>
                                    </div>

                                    <div class="form-group-item">
                                        <button type="submit" id="project_list_add_js">Ajouter</button>
                                    </div>

                                </form>
                            </div>

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

                            <div class="global-form-bg">
                                <form id="dashboard-task-add-form" class="form-group project_list_task_add_js" data-url="?path=admin-tasks-addAjax&id=" method="post">
                                    <input type="number" name="project_id_js" id="project_id_js" value="<?= $project->getId() ?>" hidden>
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
                                    <div class="form-group-item">
                                        <label for="sticker">Etiquette</label>
                                        <select name="sticker" id="sticker">
                                            <?php foreach ($stickers as $sticker) : ?>
                                                <option value="<?= $sticker->getId() ?>"><?= $sticker->getName() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class=""></span>
                                    </div>

                                    <div class="form-group-item btn_group">
                                        <button type="submit">Ajouter</button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>

                <!--ADD MEMBER-->
                <div class="dashboard-member">

                    <div class="dashboard-member-add add">

                        <div class="dashboard-member-add-title">
                            <h4>Inviter/Ajouter un member</h4>
                            <i class="fal fa-times" id="member_add_close_js"></i>
                        </div>

                        <div class="dashboard-member-add-form">

                            <div class="global-form-bg">

                                <form action="?path=admin-projects-member" id="dashboard-member-add-form" class="form-group project_add_member_js" method="post">

                                    <input type="number" name="project_id" id="project_id_js" value="<?= $project->getId() ?>" hidden>

                                    <div class="form-group-item">
                                        <label for="member_name">Nom</label>
                                        <input type="text" name="member_name" id="member_name" placeholder="Nom du member">

                                        <div class="members_list">
                                            <div>
                                                <label for="member_chosen_id" class="members_name_js">Duramana KALUMVUATI</label>
                                                <input type="checkbox" value="Duramana KALUMVUATI" name="member_chosen_id" id="member_chosen_id">
                                            </div>
                                            <div>
                                                <label for="member_chosen_id1" class="members_name_js">Cecile EVEZI</label>
                                                <input type="checkbox" value="Cecile EVEZI" name="member_chosen_id1" id="member_chosen_id1">
                                            </div>
                                            <div>
                                                <label for="member_chosen_id2" class="members_name_js">Dimitri HERTZ</label>
                                                <input type="checkbox" value="Dimitri HERTZ" name="member_chosen_id2" id="member_chosen_id2">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group-item">
                                        <label for="role">Rôle</label>
                                        <select name="role" id="role">
                                            <option value="1">Invité</option>
                                            <option value="2">Developpeur</option>
                                            <option value="3">Autre</option>
                                        </select>
                                    </div>


                                    <div class="form-group-item btn_group">
                                        <button type="submit">Inviter</button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </section>

        </section>

        <!--LIST ITEM BY HUMBURGER BTN CLICK-->
        <div class="main-humburger">

            <ul class="main-humburger-list ">

                <li class="main-humburger-list-item">
                    <a href="?path=home">ACCUEIL</a>
                </li>

                <li class="main-humburger-list-item">
                    <a href="?path=connexion">Connexion</a>
                </li>

                <li class="main-humburger-list-item">
                    <a href="?path=inscription">Inscription</a>
                </li>

            </ul>
        </div>

    </main>

    <!-- Bootstrap core JavaScript -->
    <!-- Script Sortable for drag and drop and sort elements -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>

</html>