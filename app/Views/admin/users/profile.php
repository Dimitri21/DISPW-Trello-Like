<div class="profile global-form-bg" id="login-index">

    <div class="profile-inner ">
        <?php if (isset($return_message) && !empty($return_message)) : ?>
            <div class="alert alert-<?=$class?>">
                <?= $return_message ?>
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
                    <form class="profile-canvas-input" action="/admin-users-edit&id=<?= $user->getId() ?>" method="post" enctype="multipart/form-data">
                        <input type="file" name="avatar" id="avatar" value="<?= $user->getPicture() ?>">
                        <span class="selected-filename"></span>
                    </form>
                    <img src="images/profile/<?= $user ? $user->getPicture() : '' ?>" alt=" image de <?= $user ? $user->getName() . ' ' . $user->getLastname() : '' ?>">
                </div>

            </div>

            <form class="profile-inner-body-form form-group" action="/admin-users-edit&id=<?= $user->getId() ?>" method="post">

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
                    <label for="password">Password*</label>
                    <input type="password" name="password" id="profile_password_js" placeholder="Password" required>
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
                    <a href="/admin-users-delete&id=<?=$user->getId()??'' ?>" class="danger" type="submit">Supprimer</a>
                    <button type="submit">Sauvegarder</button>
                </div>

            </form>

        </div>

    </div>

</div>