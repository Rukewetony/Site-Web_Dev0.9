<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Users - Connexion
            </h1>
        </div>
    </div>
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
        <fieldset>
            <?= $this->Form->input('username', ['class' => 'form-control']); ?>
            <?= $this->Form->input('password', ['class' => 'form-control']); ?>
        </fieldset>
    <?= $this->Form->button(__('Se Connecter'), ['class' => 'btn btn-success']); ?>
    <?= $this->Form->end() ?>
</div>
