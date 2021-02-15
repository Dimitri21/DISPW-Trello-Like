<div class="task">
    <div class="my-container">
        <div class="task-inner">

            <!--TITLE-->
            <div class="task-inner-title">
                <h3>Modification de <?= $task->getName() ?></h3>
                <button type="button" class="task-inner-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!--TITLE-->
            <div class="task-inner-form">

                <form action="/admin-tasks-edit&id=<?= $task->getId() ?>" class="task-inner-form-group" method="POST">

                    <div class="task-inner-form-group-item">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?= $task->getName() ?>">
                        <a href="/admin-projects-show&id=<?= $task->getLists() ?>"></a>
                    </div>

                    <div class="task-inner-form-group-item">
                        <label for="description">description</label>
                        <textarea name="description" id="description" cols="30" rows="10"><?= $task->getName() ?></textarea>
                    </div>

                    <fieldset class="date_start_end">

                        <div class="task-inner-form-group-item">
                            <label for="start_at">Début</label>
                            <input type="date" name="start_at" id="start_at" value="<?= $task->formatDate($task->getStartAt()) ?>">
                        </div>

                        <div class="task-inner-form-group-item">
                            <label for="end_at">Fin </label>
                            <input type="date" name="end_at" id="end_at" value="<?= $task->formatDate($task->getEndAt()) ?>">
                        </div>

                    </fieldset>

                    <div class="task-inner-form-group-item">
                        <label for="creator">Creator</label>
                        <input type="text" name="creator" id="creator" value="<?= $task->getCreator() ?>" disabled>
                    </div>
                    <div class="task-inner-form-group-item">
                        <label for="sticker">Etiquette</label>
                        <select name="sticler">
                            <?php foreach ($stickers as $key => $sticker) : ?>
                                <option value="<?= $key ?>"><?= $sticker ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>