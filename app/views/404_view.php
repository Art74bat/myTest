<?php $file_path = "app/images/jpg/404.jpg"; ?>
<div class="not_found">
    <?php if(file_exists($file_path)): ?>
        <img class="not_found__img" src="<?= $file_path; ?>" alt="404">
    <?php else: ?>`
        <h1 class="not_found__title">Страница не найдена !!!</h1>`
    <?php endif; ?>
</div>