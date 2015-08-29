<div class="container" style="margin-top: 30px;">
        <div class="login">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create() ?>
            <div class="center">
                <i class="fa fa-user fa-5x"></i>
            </div>
            <div class="grid-6">
                <?= $this->Form->input('username', ['class' => 'text', 'placeholder' => 'Votre prénom']); ?>
            </div>
            <div class="grid-6">
                <?= $this->Form->input('password', ['class' => 'text', 'placeholder' => 'Votre mot de passe']); ?>
            </div>
            <div class="grid-12 center">
                <?= $this->Form->button(__('Se connecter'), ['class' => 'btn btn-success right']) ?>
                <?= $this->Html->link("S'inscrire", ['controller' => 'Users','action' => 'add']);?>
            </div>
        <?= $this->Form->end() ?>
        </div>
    </div>
