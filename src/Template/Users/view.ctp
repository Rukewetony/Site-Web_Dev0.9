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
    <?php
        if(!$tickets_count == 0):
    ?>
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
    <?= $this->element('paginate'); ?>
    <?php
        endif;
    ?>
</div>
