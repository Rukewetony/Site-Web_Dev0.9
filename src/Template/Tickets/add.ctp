<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tickets - Création du ticket

            </h1>
        </div>
    </div>
    <?= $this->Form->create($ticket) ?>
        <?php
            echo $this->Form->input('subjects', ['class' => 'text']);
            echo $this->Form->input('content', ['class' => 'text', 'id' => 'trumbowyg']);
        ?>
    <br>
    <?= $this->Form->button(__('Ajouté'), ['class' => 'btn btn-success pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
<!--

<div class="container">
    <div class="posts">
        <div class="post">
            <div class="post-title">
                <h1><input type="text" placeholder="Nom du ticket" class="text" style="width: 90%;"></h1>
            </div>

            <div class="post-content" style="border: none!important;">
                <textarea id="trumbowyg-demo" placeholder="Ajoutez votre contenu..."></textarea>
                <input type="submit" value="Ajouer" class="right btn btn-success" style="margin-right: 25px;">
            </div>
        </div>
    </div>
</div>

-->
