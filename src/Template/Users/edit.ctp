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
            echo $this->Form->input('grade', ['class' => 'form-control']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
