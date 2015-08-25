<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 col-md-1">
            <?php
                if(!empty($user->avatar)){
                    echo $this->Html->image('upload/avatars/'. $user->avatar, ['width' => '75']);

                }else{
                    echo $this->Html->image('upload/avatars/avatar_default.png',['width' => '75']);
                }
            ?>
        </div>
        <div class="col-lg-11 col-md-11" style="margin-top: -20px;">
            <h1 class="page-header">
                <?= h($ticket->subjects) ?>
                <span style="font-size:16px;margin-top:-5px;" class="badge alert-info"><?= h($ticket->created->format('d/m/Y G:i:s')) ?></span>
                <span style="font-size:16px;margin-top:-5px;" class="badge alert-success">
                    <?= h($ticket->label == '0') ? '<span class="badge alert-success">Ouvert</span>' : '<span class="badge alert-danger">Fermé</span>' ?>
                </span>
            </h1>
        </div>
    </div>

    <div class="container">
        <p>
            <?= nl2br(h($ticket->content)); ?>
        </p>
        <div class="pull-right">

            <?php
                if($ticket->user_id == $this->request->session()->read('Auth.User.id') || $this->request->session()->read('Auth.User.role') == 'admin'){
                    echo $this->Html->link(__('Éditer'), ['action' => 'edit', $ticket->id], ['class' => 'btn btn-info']);
                    echo " | " . $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $ticket->id], ['class' => 'btn btn-danger', 'confirm' => __('Voulez vous vraiment supprimer le ticket? ')]);
                }
            ?>
            Par <strong><?= $ticket->user->username ?></strong>
            <?= "Ajouté le <strong>" . h($ticket->modified->format('d/m/Y G:i:s')) . "</strong>"?>
        </div>
    </div>

    <hr>

    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><span class="label label-default">Gynidark</span>
                <small>22/08/2015 22:13:54</small>
                <small><a href="#">Répondre</a></small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>

    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><span class="label label-danger">Gynidark</span>
                <small>22/08/2015 22:13:54</small>
                <small><a href="#">Répondre</a></small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>

    <div class="media media-response">
        <div class="pull-left">
            <i class="fa fa-check fa-2x media-response-i"></i>
        </div>
        <div class="media-body">
            <h3>Ce ticket a été résolu. </h3>
        </div>
    </div>

    <div class="media media-response">
        <div class="pull-left">
            <i class="fa fa-calendar-o fa-2x media-response-i-danger"></i>
        </div>
        <div class="media-body">
            <h3>Ce ticket est trop vieux, il a plus d'un mois. </h3>
        </div>
    </div>

    <div class="well" style="margin-top: 30px;">
        <h4>Écrire un commentaire:</h4>
        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
        </form>
    </div>
</div>
