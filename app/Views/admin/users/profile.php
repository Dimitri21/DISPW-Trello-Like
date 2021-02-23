<div class="profile global-form-bg" id="login-index">

    <div class="profile-inner ">
        <?php if (isset($message) && !empty($message)) : ?>
            <div class="alert alert-<?= $class ?? '' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>
        <div class="inner-title">
            <div class=" inner-title-circle"></div>
            <div class="inner-title-text">
                <h3>Mes informations</h3>
            </div>
        </div>

        <div class="profile-inner-body card">

            <div class="profile-inner-body-avatar">

                <div class="profile-canvas">
                    <form class="profile-canvas-input" action="?path=admin-users-upload&id=<?= $user->getId() ?>" method="post" enctype="multipart/form-data">
                        <input type="file" name="uploadFile" id="profile_avatar_js">
                        <span class="selected-filename"></span>
                        <button type="submit" id="profile_button_js">Valider</button>
                    </form>
                    <img src="images/profile/<?= \app\App::getInstance()->picture ?? '/default/man.jpg' ?>" alt=" image de <?= $user ? $user->getName() . ' ' . $user->getLastname() : '' ?>">
                </div>

            </div>

            <form class="profile-inner-body-form form-group" action="?path=admin-users-edit&id=<?= $user->getId() ?>" method="post">

                <div class="form-group-item">
                    <label for="lastname">Prénom*</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Prénom" value="<?= $user ? $user->getLastname() : '' ?>" required>
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="name">Nom*</label>
                    <input type="text" name="name" id="name" placeholder="Nom" value="<?= $user ? $user->getName() : '' ?>" required>
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="email">Email*</label>
                    <input type="email" name="email" id="email" placeholder="Email*" value="<?= $user ? $user->getEmail() : '' ?>" required>
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password">Mot de passe*</label>
                    <input type="password" name="password" id="profile_password_js" placeholder="Mot de passe" required>
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password-conf">Password de confirmation*</label>
                    <input type="password" name="password-conf" id="profile_password_confi_js" placeholder="Mot de passe de confirmation" required>
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <span>*Champs obligatoires</span>
                </div>

                <div class="form-group-item">
                    <a href="?path=admin-projects-index" class="my-btn my-btn-default" type="submit">
                        <i class="far fa-backspace"></i>
                    </a>
                    <a href="?path=admin-users-delete&id=<?= $user->getId() ?? '' ?>" class="my-btn my-btn-danger" type="submit">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <button type="submit"><i class="fal fa-save"></i></button>
                </div>

            </form>

        </div>

    </div>

</div>