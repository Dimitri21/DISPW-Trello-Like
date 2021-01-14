

<div class="container" style="margin-top: 100px;">
    <?= $login_error;?>
    <form method="post">
        <?= $form->input('email','Email',['type'=>'text']);?>
        <?= $form->input('motdepass','Mot de Passe',['type'=>'password']);?>
        <button class="btn btn-primary">Validez</button>
    </form>

</div>

