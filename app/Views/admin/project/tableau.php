<section class="project">

    <div class="my-container">

        <div class="project-inner">

            <div class="inner-title">
                <div>
                    <h3>Vos tableaux</h3>
                </div>
            </div>

            <!--ADD BTN-->

            <div class="project-inner-add ">

                <div class="project-add-btn ">
                    <i class="fas fa-plus-circle project-add-js"></i>
                </div>

                <!--PROJECT ADD FORM-->
                <div class="project-inner-add-new">

                    <div class="inner-title">
                        <div class=" inner-title-circle"></div>
                        <div class="inner-title-text">
                            <h3>Création d'un tableau</h3>
                        </div>
                    </div>

                    <div class="card">

                        <form class=" form-group" action="/project/add" method="post">

                            <div class="form-group-item">
                                <input type="text" name="project" id="project" placeholder="project">
                                <span class=""></span>
                            </div>

                            <div class="form-group-item">
                                <button type="submit">Créer</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <!--PROJECT DOING-->
            <div class="project-inner-doing">

                <div class="project-title">
                    <i class="fas fa-user-clock"></i>
                    <h3>Tableau en cours d'utilisation</h3>
                </div>

                <div class="projects">

                    <!--PROJECT CARD-->
                    <div class="projects-item">
                        <img src="images/projects/ps.jpg" alt="project bg">
                        <div class="projects-item-title">
                            <h4>Project Name</h4>
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <a href="/admin-project-show&id=1" class="projects-item-link"></a>
                    </div>

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
                    <div class="projects-item">
                        <img src="images/projects/ps.jpg" alt="project bg">
                        <div class="projects-item-title">
                            <h4>Project Name</h4>
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <a href="/admin-project-show&id=2" class="projects-item-link"></a>
                    </div>

                    <div class="projects-item">
                        <img src="images/projects/ps.jpg" alt="project bg">
                        <div class="projects-item-title">
                            <h4>Project Name</h4>
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <a href="/admin-project-show&id=2" class="projects-item-link"></a>
                    </div>

                    <div class="projects-item">
                        <img src="images/projects/ps.jpg" alt="project bg">
                        <div class="projects-item-title">
                            <h4>Project Name</h4>
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <a href="/admin-project-show&id=1" class="projects-item-link"></a>
                    </div>

                    <div class="projects-item">
                        <img src="images/projects/ps.jpg" alt="project bg">
                        <div class="projects-item-title">
                            <h4>Project Name</h4>
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <a href="/admin-project-show&id=1" class="projects-item-link"></a>
                    </div>
                </div>

            </div>

        </div>
</section>