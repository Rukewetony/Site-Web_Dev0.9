<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tickets - Création du ticket
            </h1>
        </div>
    </div>
    <?= $this->Form->create($ticket) ?>
    <fieldset>
        <?php
            echo $this->Form->input('subjects', ['class' => 'form-control']);
            echo $this->Form->input('content', ['class' => 'form-control']);
            echo $this->Form->input('label', ['class' => 'form-control']);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
