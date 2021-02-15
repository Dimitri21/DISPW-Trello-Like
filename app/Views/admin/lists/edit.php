<div class="list">
    <!--ADD NEW LIST-->
    <div class="list-add">

        <div class="list-add-title">
            <h4>Editer <?= $list->getName() ?></h4>
        </div>

        <div class="list-add-form">
            <!--TODO to correct the class name typing mistake-->
            <form method="get" id="list-add-form" data-url="/admin-lists-edit&id=<?= $list->getName() ?>">
                <input type="text" name="name" id="name" placeholder="Nom de la liste" value="<?= $list->getName() ?>">
                <textarea name="description" id="description" cols="15" rows="5" placeholder="Description">
                    <?= $list->getDescription() ?>
                </textarea>
                <input type="text" name="project" id="project" value="<?= $list->getProject() ?>" desabled>
                <input type="number" name="orders" id="orders" value="<?= $list->getOrders() ?>">
                <button type="submit">Ajouter</button>
            </form>
        </div>

    </div>

</div>