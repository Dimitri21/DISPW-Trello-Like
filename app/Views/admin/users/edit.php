<div class="profile global-form-bg" id="login-index">

    <div class="profile-inner ">

        <div class="inner-title">
            <div class=" inner-title-circle"></div>
            <div class="inner-title-text">
                <h3>Profil de <?= $user ? $user->getLastname() : "" ?></h3>
            </div>
        </div>

        <div class="profile-inner-body card">

            <div class="profile-inner-body-avatar">

                <div class="profile-canvas">
                    <form class="profile-canvas-input" action="?path=admin-users-edit&id=<?=$user->getId()?>" method="post" enctype="multipart/form-data">
                        <input type="file" name="avatar" id="avatar">
                        <span class="selected-filename"></span>
                    </form>
                    <img src="<?= $user ? $user->getAvatar() : '' ?>" alt=" image de <?= $user ? $user->getName() . ' ' . $user->getLastname() : '' ?>">
                </div>

            </div>

            <form class="profile-inner-body-form form-group" action="?path=admin-users-edit&id=<?=$user->getId()?>" method="post">

                <div class="form-group-item">
                    <label for="name">Nom<sup>*</sup></label>
                    <input type="text" name="name" id="name" placeholder="Nom" value="<?= $user ? $user->getName() : '' ?>">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="lastname">Prénom<sup>*</sup></label>
                    <input type="text" name="lastname" id="lastname" placeholder="Prénom" value="<?= $user ? $user->getLastname() : '' ?>">
                    <span class=""></span>
                </div>


                <div class="form-group-item">
                    <label for="email">Email<sup>*</sup></label>
                    <input type="email" name="email" id="email" placeholder="Email*" value="<?= $user ? $user->getEmail() : '' ?>">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password">Password<sup>*</sup></label>
                    <input type="password" name="password" id="password" placeholder="Password*">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password-conf">Password de confirmation<sup>*</sup></label>
                    <input type="password" name="password-conf" id="password-conf" placeholder="Mot de passe de confirmation*">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <span>*Champs obligatoires</span>
                </div>

                <div class="form-group-item">
                    <button type="submit">Sauvegarder</button>
                </div>

            </form>

        </div>

    </div>

</div>