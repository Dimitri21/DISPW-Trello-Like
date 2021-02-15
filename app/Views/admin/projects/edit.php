<section class="project-edit" id="project_edit_js">

    <div class="my-container">

        <div class="project-edit-inner">
            <div class="card">
                <form class=" form-group" action="/admin-projects-<?=$method?? 'add'?>" method="post">

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
                        <a href="/admin-projects-index" id="project_annuler_js">Annuler</a>
                        <button type="submit">Ajouter</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</section>