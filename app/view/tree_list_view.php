<style type="text/css">
    a.secondary-content {
        margin-right: 20px;
    }
</style>
<? if (isset($data['delete'])): ?>
    <h3><?= ($data['delete']) ? "Deleted" : "Error" ?></h3>
<? else: ?>
    <ul class="collection with-header">
        <li class="collection-header"><h4>Names</h4></li>
        <? foreach($data['members'] as $item): ?>
            <li class="collection-item">
                <div>
                    <?= $item['name'] ?>
                    <a href="/tree/delete/<?= $item['id'] ?>" class="secondary-content"><i class="material-icons" title="Delete">delete</i></a>
                    <a href="/tree/add/<?= $item['id'] ?>" class="secondary-content"><i class="material-icons" title="Edit">account_box</i></a>
                </div>
            </li>
        <? endforeach; ?>
    </ul>
<? endif; ?>