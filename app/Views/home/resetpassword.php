<div class="resetpassword global-form-bg" id="resetpassword-index">

    <div class="resetpassword-inner ">

        <div class="resetpassword-inner-title">
            <div>
                <h3>Réinitialiser votre mot de passe</h3>
            </div>
        </div>

        <div class="resetpassword-inner-body card">

            <form class="resetpassword-inner-body-form form-group" action="?p=user.resetpassword" method="post">

                <div class="form-group-item">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe*">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password-conf">Mot de passe de confirmation</label>
                    <input type="password" name="password-conf" id="password-conf" placeholder="Mot de passe de confirmation*">
                    <span class=""></span>
                </div>


                <div class="form-login">
                    <a href="?p=home.login">Connexion</a>
                </div>

                <div class="form-group-item">
                    <button type="submit">Réinitialiser</button>
                </div>

            </form>

        </div>

    </div>

</div>