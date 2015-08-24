<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Membres
            </h1>
        </div>
    </div>

    <div class="row">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th><?= $this->Paginator->sort('website') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->created->format('d/m/Y G:i:s')) ?></td>
            <td><?= h($user->modified->format('d/m/Y G:i:s')) ?></td>
            <td><?= h($user->website) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Regarder'), ['controller' => 'Users', 'action' => 'view', $user->id], ['class' => 'btn btn-info']) ?>
                <?php
                if($user->user_id == $this->request->session()->read('Auth.User.id') || $this->request->session()->read('Auth.User.role') == 'admin'):
                ?>
                    <?= $this->Html->link(__('Éditer'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'btn btn-warning']) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class' => 'btn btn-danger', 'confirm' => __('Voulez vous vraiment supprimer ce ticket? '. "\n" . $user->subjects)]) ?>
                <?php endif?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
