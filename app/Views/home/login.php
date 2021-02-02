<div class="login global-form-bg" id="login-index">

    <div class="login-inner ">

        <div class="inner-title">
            <div class=" inner-title-circle"></div>
            <div class="inner-title-text">
                <h3>Connexion</h3>
            </div>
        </div>

        <div class="login-inner-body card">

            <form class="login-inner-body-form form-group" action="/admin-sign-login" method="post">

                <div class="form-group-item">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email*">
                    <span class=""></span>
                </div>

                <div class="form-group-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password*">
                    <span class=""></span>
                </div>

                <div class="form-remember">
                    <div>
                        <input type="checkbox" name="remember-me" id="remember-me">
                        <label for="remember-me">Restez connecté</label>
                    </div>
                    <a href="/reinit_mot_de_passe">Mot de passe oublié</a>
                </div>

                <div class="form-group-item">
                    <button type="submit" name="submit">Connexion</button>
                </div>

            </form>

        </div>

    </div>

</div>