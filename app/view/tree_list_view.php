<style type="text/css">
    a.secondary-content {
        margin-right: 20px;
    }
</style>
<? if (isset($data['delete'])): ?>
    <h3><?= ($data['delete']) ? "Deleted" : "Error" ?></h3>
<? else: ?>
    <table>
        <thead>
            <th>Names</th>
            <th>Sex</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <? foreach($data['members'] as $item): ?>
                <tr>
                    <td>
                        <span><?= $item['name'] ?></span>
                    </td>
                    <td>
                        <span style="color: #<?= ($item['sex'] == 0) ? "4169E1" : "F08080" ?> "><?= ($item['sex'] == 0) ? "Male" : "Female" ?></span>
                    </td>
                    <td>
                        <a href="/tree/delete/<?= $item['id'] ?>" class="secondary-content"><i class="material-icons" title="Delete">delete</i></a>
                        <a href="/tree/add/<?= $item['id'] ?>" class="secondary-content"><i class="material-icons" title="Edit">account_box</i></a>
                    </td>
                </tr>
            <? endforeach; ?>
        </tbody>
    </table>
<? endif; ?>