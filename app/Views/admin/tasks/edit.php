<div class="task">
    <div class="my-container">
        <div class="task-inner">

            <!--TITLE-->
            <div class="task-inner-title">
                <h3>Modification de <?= $task->getName() ?></h3>
            </div>

            <!--FORM-->
            <div class="global-form-bg">
                <form action="/admin-tasks-edit&id=<?= $task->getId() ?>" class="form-group" method="POST">
                    <input type="text" name="project_id" id="project_id" value="<?= $project_id ?>" hidden>

                    <div class="form-group-item">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?= $task->getName() ?>">
                        <a href="/admin-projects-show&id=<?= $task->getLists() ?>"></a>
                    </div>

                    <div class="form-group-item">
                        <label for="description">description</label>
                        <textarea name="description" id="description" cols="30" rows="10"><?= $task->getDescription() ?></textarea>
                    </div>

                    <div class="form-group-item">
                        <label for="start_at">Début</label>
                        <input type="date" name="start_at" id="start_at" value="<?= $task->formatDate($task->getStartAt()) ?>" disabled>
                    </div>

                    <div class="form-group-item">
                        <label for="end_at">Fin </label>
                        <input type="date" name="end_at" id="end_at" value="<?= $task->formatDate($task->getEndAt()) ?>">
                    </div>

                    <div class="form-group-item">
                        <label for="creator">Creator</label>
                        <input type="text" name="creator" id="creator" value="<?= $task->getCreator() ?>" disabled>
                    </div>

                    <div class="form-group-item">
                        <label for="sticker">Etiquette</label>
                        <select name="sticker">
                            <option value="none">Nothing</option>
                            <?php foreach ($stickers as $sticker) : ?>
                                <?php echo $sticker->getId() . "=>" . $task->getSticker(); ?>
                                <?php if ($sticker->getId() == $task->getSticker()) : ?>
                                    <option value="<?= $sticker->getId() ?>" selected><?= ucfirst($sticker->getName()) ?></option>
                                <?php else : ?>
                                    <option value="<?= $sticker->getId() ?>"><?= ucfirst($sticker->getName()) ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group-item">
                        <label for="sticker">Listes</label>
                        <select name="list">
                            <?php foreach ($lisks as $list) : ?>
                                <?php if ($list->getId() == $task->getLists()) : ?>
                                    <option value="<?= $list->getId() ?>" selected><?= ucfirst($list->getName()) ?></option>
                                <?php else : ?>
                                    <option value="<?= $list->getId() ?>"><?= ucfirst($list->getName()) ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group-item">
                        <a class="btn" href="/admin-projects-show&id=<?= $project_id ?>">
                            <i class="far fa-backspace"></i>
                        </a>
                        <button type="submit"><i class="fal fa-save"></i></button>
                    </div>

                </form>
            </div>

            <div class="task-inner-comments global-form-bg">

                <!--COMMENTS-->
                <div class="task-inner-comments-inner" id="comments_list_js">
                    <?php foreach ($task->getComments() as  $comment) : ?>

                        <div class="comment-item">

                            <div class="comment-item-author">
                                <p> <span> <?= substr($comment->getUserObj()->getName(), 0, 1) ?></span></p>
                            </div>

                            <div class="comment-item-message">
                                <p><?= $comment->getComment() ?></p>
                                <div>
                                    <span><i class="far fa-calendar-alt"></i>12/01/2020 - </span>
                                    <span><i class="far fa-clock"></i>12:30 </span>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

                <!--id = task's id-->
                <form class="form-group" action="/admin-tasks-comment&id=<?= $task->getId() ?>" method="POST" id="task_comment_js">
                    <div class="form-group-item">
                        <label for="comment">Commentaire</label>
                        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Laissez votre comomentaire ici"></textarea>
                    </div>

                    <div class="form-group-item">
                        <button type="submit">Commenter</button>
                    </div>

                </form>

            </div>



        </div>
    </div>
</div>