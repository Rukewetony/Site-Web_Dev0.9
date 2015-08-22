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
            <th><?= $this->Paginator->sort('subjects') ?></th>
            <th><?= $this->Paginator->sort('label') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tickets as $ticket): ?>
        <tr>
            <td><?= $this->Number->format($ticket->id) ?></td>
            <td><?= h($ticket->subjects) ?></td>
            <td><?= h($ticket->label == '0') ? '<span class="label label-success">Ouvert</span>' : '<span class="label label-danger">Fermé</span>' ?></td>
            <td><?= h($ticket->created) ?></td>
            <td><?= h($ticket->modified) ?></td>
            <td>
                <?= h($ticket->user_id) ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $ticket->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticket->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticket->id], ['confirm' => __('Voulez vous vraiment supprimer ce ticket? '. "\n" . $ticket->subjects)]) ?>
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
