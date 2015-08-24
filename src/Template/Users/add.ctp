<div class="container-fluid">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->input('username', ['class' => 'form-control']);
            echo $this->Form->input('mail', ['class' => 'form-control']);
            echo $this->Form->input('website', ['class' => 'form-control']);
            echo $this->Form->input('password', ['class' => 'form-control']);

        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Ajouté'), ['class' => 'btn btn-success pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
