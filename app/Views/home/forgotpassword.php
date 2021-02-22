<div class="resetpassword global-form-bg" id="resetpassword-index">

    <div class="resetpassword-inner ">
        <?php if (isset($message) && !empty($message)) : ?>
            <div class="alert alert-infos">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <div class="inner-title">
            <div class=" inner-title-circle"></div>
            <div class="inner-title-text">
                <h3>Email de récuperation</h3>
            </div>
        </div>

        <div class="resetpassword-inner-body card">

            <form class="resetpassword-inner-body-form form-group" action="?path=home-forgotpassword" method="post">

                <div class="form-group-item">
                    <label for="email">Adresse email de récuperation*</label>
                    <input type="email" name="email" id="email" placeholder="Adresse email de récuperation">
                    <span class=""></span>
                </div>

                <div class="form-login">
                    <a href="?path=connexion">Connexion</a>
                </div>

                <div class="form-group-item">
                    <button type="submit">Réinitialiser</button>
                </div>

            </form>

        </div>

    </div>

</div>