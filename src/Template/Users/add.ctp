<div class="container-fluid">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('avatar');
            echo $this->Form->input('website');
            echo $this->Form->input('mail');
            echo $this->Form->input('role', [
                'options' => ['admin' => 'Admin', 'author' => 'Author'
            ]]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
