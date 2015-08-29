<div class="container">
    <div class="posts">
        <div class="post">
            <?= $this->Form->create($ticket) ?>
            <div class="post-title">
                <!--  Si le ticket est résolu, icon star -->
                <h1><?= $this->Form->input('subjects', ['class' => 'text', 'label' => false]); ?></h1>

            </div>

            <div class="post-content" style="border: none!important;">

                <?= $this->Form->textarea('content', ['id' => 'trumbowyg']); ?>
            </div>
            <?= $this->Form->button(__('Édité'), ['class' => 'btn btn-success pull-right']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
