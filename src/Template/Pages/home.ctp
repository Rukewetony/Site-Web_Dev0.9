 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">21</div>
                                        <div>Nouveaux commentaires</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">En s'avoir +</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-ticket fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $Tickets; ?></div>
                                        <div>Tickets</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">En s'avoir +</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $Users; ?></div>
                                        <div>Membres inscrits</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">En s'avoir +</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Mes tickets <span style="font-size:16px;margin-top:-5px;" class="badge alert-info">2</span>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Sujet</th>
                                <th>Auteur</th>
                                <th>Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">21/08/2015</th>
                                <td><a href="#">Souci avec CakePHP & Bootstrap</a></td>
                                <td>Gynidark</td>
                                <td>
                                    <span class="label label-success">Ouvert</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">21/08/2015</th>
                                <td><a href="#">Souci avec CakePHP & Bootstrap</a></td>
                                <td>Gynidark</td>
                                <td>
                                    <span class="label label-danger">Fermé</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tout les tickets
                            <span style="font-size:16px;margin-top:-5px;" class="badge alert-info">
                                <?= $Tickets; ?>
                            </span>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Sujet</th>
                                <th>Label</th>
                                <th>Création</th>
                                <th class="actions"><?= __('Actions') ?></th>
                                <th>Report</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tickets as $ticket): ?>
                            <tr>
                                <td><?= $this->Number->format($ticket->id) ?></td>
                                <td><?= h($ticket->subjects) ?></td>
                                <td><span class="label label-success">Ouvert</span> <?= "" //$this->Number->format($ticket->label) ?></td>
                                <td><?= h($ticket->created) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Regardé'), ['action' => 'view', $ticket->id]) ?> |
                                    <?= $this->Html->link(__('Édité'), ['action' => 'edit', $ticket->id]) ?> |
                                    <?= $this->Form->postLink(__('Supprimé'), ['action' => 'delete', $ticket->id], ['confirm' => __('Voulez vous vraiment supprimer le ticket? ')]) ?>
                                </td>
                                <td><span class="label label-danger">report</span></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>