<div class="container-fluid">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username', ['class' => 'form-control']);
            echo $this->Form->input('password', ['class' => 'form-control']);
            echo $this->Form->input('avatar', ['class' => 'form-control']);
            echo $this->Form->input('website', ['class' => 'form-control']);
            echo $this->Form->input('mail', ['class' => 'form-control']);
            if ($this->request->session()->read('Auth.User.role') == 'admin'){
                echo $this->Form->input('role', ['class' => 'form-control',
                    'options' => ['admin' => 'Admin', 'member' => 'modo','Modo' => 'Member'
                ]]);
            }
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
