<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="page-header">
                Tickets
            </h1>
        </div>
        <div class="col-lg-2">
            <h1 class="page-header">
            <?php if ($this->request->session()->read('Auth.User')): ?>
                <?php
                    echo $this->Html->link(
                        'Ajouté un ticket',
                        array(
                            'controller' => 'Tickets',
                            'action' => 'add'
                        ), ['class' => 'btn btn-success']
                    );
                ?>
            <?php endif; ?>
            </h1>
        </div>
    </div>

    <div class="row">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('Suject') ?></th>
            <th><?= $this->Paginator->sort('label') ?></th>
            <th><?= $this->Paginator->sort('Créé le') ?></th>
            <th><?= $this->Paginator->sort('Modifier le') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tickets as $ticket): ?>
        <tr>
            <td><?= $this->Number->format($ticket->id) ?></td>
            <td>
                <?=
                    $this->Html->link(
                        $ticket->subjects,
                        ['action' => 'view', $ticket->id]
                    );
                ?>
            </td>
            <td><?= h($ticket->label == '0') ? '<span class="label label-success">Ouvert</span>' : '<span class="label label-danger">Fermé</span>' ?></td>
            <td><?= h($ticket->created->format('d/m/Y G:i:s')) ?></td>
            <td><?= h($ticket->modified->format('d/m/Y G:i:s')) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Regarder'), ['controller' => 'Tickets', 'action' => 'view', $ticket->id], ['class' => 'btn btn-info']) ?>
                <?php
                if($ticket->user_id == $this->request->session()->read('Auth.User.id') || $this->request->session()->read('Auth.User.role') == 'admin'):
                ?>
                    <?= $this->Html->link(__('Éditer'), ['controller' => 'Tickets', 'action' => 'edit', $ticket->id], ['class' => 'btn btn-warning']) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Tickets', 'action' => 'delete', $ticket->id], ['class' => 'btn btn-danger', 'confirm' => __('Voulez vous vraiment supprimer ce ticket? '. "\n" . $ticket->subjects)]) ?>
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
