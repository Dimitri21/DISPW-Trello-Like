<div class="signup global-form-bg" id="login-index">

    <div class="signup-inner ">
        <div class="inner-title">
            <div class=" inner-title-circle"></div>
            <div class="inner-title-text">
                <h3>Inscription</h3>
            </div>
        </div>

        <div class="signup-inner-body card">

            <form class="signup-inner-body-form form-group" action="/inscription" method="post">

                <div class="form-group-item">
                    <label for="lastname">Prénom*</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Prénom*">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="name">Nom*</label>
                    <input type="text" name="name" id="name" placeholder="Nom*">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="email">Email*</label>
                    <input type="email" name="email" id="email" placeholder="Email*">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password">Password*</label>
                    <input type="password" name="password" id="password" placeholder="Password*">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password-conf">Password de confirmation*</label>
                    <input type="password" name="password-conf" id="password-conf" placeholder="Mot de passe de confirmation*">
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
                        <span for="">Vous avez déjà un compte?<a href="/connexion">Connectez-vous</a></span>
                    </div>
                </div>

                <div class="form-group-item">
                    <button type="submit">Inscription</button>
                </div>

            </form>

        </div>

    </div>

</div>