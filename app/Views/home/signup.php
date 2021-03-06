<div class="signup global-form-bg" id="login-index">


    <div class="signup-inner ">

        <?php if (isset($message) && !empty($message)) : ?>
            <div class="alert alert-danger">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <div class="inner-title">
            <div class=" inner-title-circle"></div>
            <div class="inner-title-text">
                <h3>Inscription</h3>
            </div>
        </div>

        <div class="signup-inner-body card">

            <form class="signup-inner-body-form form-group" action="?path=inscription" method="post">

                <div class="form-group-item">
                    <label for="lastname">Prénom*</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Prénom*" value="<?= $user->getLastname() ?>">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="name">Nom*</label>
                    <input type="text" name="name" id="name" placeholder="Nom*" value="<?= $user->getName() ?>">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="email">Email*</label>
                    <input type="email" name="email" id="email" placeholder="Email*" value="<?= $user->getEmail() ?>">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password">Mot de passe*</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password-conf">Confirmer le mot de passe*</label>
                    <input type="password" name="password-conf" id="password-conf" placeholder="Confirmer le mot de passe">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <span>*Champs obligatoires</span>
                </div>

                <div class="form-group-ugc">

                    <div class="">
                        <input type="checkbox" name="ugc" id="ugc">
                        <label for="ugc">j'accepte les Conditions Générales d'Utilisation</label>
                    </div>

                    <div>
                        <input type="checkbox" name="sprinto" id="sprinto">
                        <label for="sprinto">j'accepte la société sprinto utiliser mes données personnelles conformément à la politique de confidentialité</label>
                    </div>
                    <div>
                        <span for="">Vous avez déjà un compte?<a href="?path=connexion">Connectez-vous</a></span>
                    </div>
                </div>

                <div class="form-group-item">
                    <button type="submit">Inscription</button>
                </div>

            </form>

        </div>

    </div>

</div>