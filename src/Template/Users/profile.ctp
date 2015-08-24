<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 lead">Votre profil<hr></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <?php
                                if(!empty($user->avatar)){
                                    echo $this->Html->image('upload/avatars/'. $user->avatar);

                                }else{
                                    echo $this->Html->image('upload/avatars/avatar_default.png');
                                }
                            ?>

                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="only-bottom-margin"><?= $user->username; ?></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text-muted">Email:</span><?= $user->mail; ?><br>
                                    <span class="text-muted">Compté créé :</span> <?= $user->created->format('d/m/Y G:i:s'); ?><br>
                                    <span class="text-muted">Role :</span> <?= $user->role; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <?php
                                echo $this->Html->link(
                                    'Éditer mon compte',
                                    array(
                                        'controller' => 'Users',
                                        'action' => 'edit',
                                        $user['id']
                                    ), [
                                    'class' => 'btn btn-info pull-right'
                                    ]
                                );
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Mes tickets
                <span style="font-size:16px;margin-top:-5px;" class="badge alert-info"><?= $tickets_count; ?></span>
            </h2>
        </div>
    </div>

    <div class="row">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('Sujet') ?></th>
            <th><?= $this->Paginator->sort('label') ?></th>
            <th><?= $this->Paginator->sort('Créé le') ?></th>
            <th><?= $this->Paginator->sort('Modifié le') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php

    foreach ($tickets as $ticket): ?>
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
                <?= $this->Html->link(__('View'), ['action' => 'view', $ticket->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticket->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticket->id], ['confirm' => __('Voulez vous vraiment supprimer ce ticket? '. "\n" . $ticket->subjects)]) ?>
            <td><?= "" //h($ticket->label == '0') ? '<span class="label label-success">Pas résolu</span>' : '<span class="label label-danger">Résolu</span>' ?></td>

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
