<section class="project-edit" id="project_edit_js">

    <div class="my-container">
        <!--ADD NEW LIST-->

        <div class="project-edit-title">
            <h3>Editer <?= $project->getName() ?></h3>
        </div>

        <div class="project-edit-inner">
            <div class="card">
                <form class=" form-group" action="/admin-projects-<?= $method ?? 'add' ?>" method="post">

                    <div class="form-group-item">
                        <label for="project_name">Name</label>
                        <input type="text" name="project_name" id="project_name" placeholder="project" value="<?= $project->getName() ?>">
                        <span class=""></span>
                    </div>
                    <div class="form-group-item">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="fa-rotate-270" rows="10" value=""><?= $project->getDescription() ?></textarea>
                        <span class=""></span>
                    </div>

                    <div class="form-group-item btn_group">
                        <a href="/admin-projects-index" id="project_annuler_js">
                            <i class="far fa-backspace"></i>
                        </a>
                        <button type="submit">
                            <i class="fal fa-save"></i>
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</section>