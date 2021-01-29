<div class="profile global-form-bg" id="login-index">

    <div class="profile-inner ">

        <div class="inner-title">
            <div class=" inner-title-circle"></div>
            <div class="inner-title-text">
                <h3>Profil de <?= $user?$user->getLastname():"" ?></h3>
            </div>
        </div>

        <div class="profile-inner-body card">

            <div class="profile-inner-body-avatar">

                <div class="profile-canvas">
                    <form class="profile-canvas-input" action="/upload-image" method="post" enctype="multipart/form-data">
                        <input type="file" name="avatar" id="avatar">
                        <span class="selected-filename"></span>
                    </form>
                    <img src="<?= $user?$user->getAvatar():'' ?>" alt=" image de <?= $user?$user->getName() . ' ' . $user->getLastname():'' ?>">
                </div>

            </div>

            <form class="profile-inner-body-form form-group" action="/connexion" method="post">

                <div class="form-group-item">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom*" value="<?= $user?$user->getLastname():'' ?>">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom*" value="<?= $user?$user->getName():'' ?>">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email*" value="<?= $user?$user->getEmail():'' ?>">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password*">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password-conf">Password de confirmation</label>
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