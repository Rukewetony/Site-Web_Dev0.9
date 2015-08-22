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
            <img class="img-circle avatar avatar-original" style="-webkit-user-select:none;
            display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
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
            <span class="text-muted">Compté créé :</span> <?= $user->created; ?>
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
                'class' => 'btn btn-default pull-right'
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