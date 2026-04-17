<?php $newsList = $newsList ?? []; ?>

<h3>CRUD News</h3>

<form method="POST" action="/public/index.php?action=create">
    <input name="title" class="form-control mb-1" placeholder="Titre">
    <textarea name="article" class="form-control mb-1" placeholder="Article"></textarea>
    <input name="by" class="form-control mb-1" placeholder="Auteur">
    <button class="btn btn-light btn-sm">Créer</button>
</form>

<hr>

<?php if (!empty($newsList)): ?>
    <?php foreach ($newsList as $n): ?>
        <div class="p-2 border-bottom border-secondary">
            <b><?= $n['new_title'] ?></b><br>
            <small><?= $n['new_article'] ?></small><br>
            <small><?= $n['new_by'] ?></small>

            <form method="POST" action="/public/index.php?action=delete">
                <input type="hidden" name="id" value="<?= $n['new_id'] ?>">
                <button class="btn btn-danger btn-sm mt-1">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted">Aucune news</p>
<?php endif; ?>