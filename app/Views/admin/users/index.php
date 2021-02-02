
<div class="container">
    <h1>INDEX - USER <?=$id??""?></h1>

    <?php if ($users): ?>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li>
                <a href="/users-edit-<?=$user->getId()?>"><?=$user->getId()?> - <?=$user->getName()?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>