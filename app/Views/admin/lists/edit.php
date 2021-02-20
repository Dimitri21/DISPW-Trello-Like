<div class="list">
    <div class="my-container">
        <!--ADD NEW LIST-->
        <div class="list-add">

            <div class="list-add-title">
                <h3>Editer <?= $list->getName() ?></h3>
            </div>

            <div class="global-form-bg">
                <!--TODO to correct the class name typing mistake-->
                <form class="form-group" method="POST" id="list-add-form" data-url="/admin-lists-edit&id=<?= $list->getName() ?>">
                    <input type="text" name="project_id" id="project_id" value="<?= $list->getProject() ?>" hidden>
                    <div class="form-group-item">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" placeholder="Nom de la liste" value="<?= $list->getName() ?>">
                    </div>
                    <div class="form-group-item">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="15" rows="5" placeholder="Description"><?= $list->getDescription() ?></textarea>
                    </div>
                    <div class="form-group-item">
                        <label for="project">Projet</label>
                        <input type="text" name="project" id="project" value="<?= $list->getProjectObj()->getName() ?>" disabled>
                    </div>
                    <div class="form-group-item">
                        <label for="orders">Ordre</label>
                        <input type="number" name="orders" id="orders" value="<?= $list->getOrders() ?>">
                    </div>
                    <div class="form-group-item">
                        <a href="/admin-projects-show&id=<?= $list->getProject() ?>" type="submit" class="my-btn my-btn-default">
                            <i class="far fa-backspace"></i>
                        </a>
                        <a href="/admin-lists-delete&id=<?= $list->getId() ?>&proj=<?= $list->getProject() ?>" type="submit" class="my-btn my-btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <button type="submit" class="my-btn my-btn-primary"><i class="fal fa-save"></i></button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>