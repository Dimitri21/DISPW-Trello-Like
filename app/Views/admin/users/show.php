<div class="jumbotron">
    <div class="container">
        <div class="text-center text-primary m-4">
            <h1>Profil de <?= $user->getNames() ?></h1>
        </div>
        <div style="width: 350px; margin:0 auto;" class="p-3">
            <p class="text-center"><a class="btn btn-primary" href="?path=admin-projects-members&id=<?= $member->getProject() ?>" role="button">Return aux Membres &raquo;</a></p>
        </div>
    </div>
</div>

<div class="container">

    <div class="row">

        <div class="col col-md-4 col-sm-6">
            <div class="album py-5 bg-light">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="images/profile/<?= $user->getPicture() ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Salut et bienvenu(e) sur mon profil. Je suis très comptent de savoir que tu es passé(e) par là.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-md-8 col-sm-6">
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Nom</h6>
                    </div>
                    <span class="text-muted"><?= $user->getName() ?></span>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Prénom</h6>
                    </div>
                    <span class="text-muted"><?= $user->getLastName() ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Email</h6>
                    </div>
                    <span class="text-muted"><?= $user->getEmail() ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Membre depuis</h6>
                    </div>
                    <span class="text-muted"><?= $member->getInvitedAt() ?></span>
                </li>
            </ul>
        </div>

    </div>

</div>