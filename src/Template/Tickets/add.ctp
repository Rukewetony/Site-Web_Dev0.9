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
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Ajouté'), ['class' => 'btn btn-success pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
