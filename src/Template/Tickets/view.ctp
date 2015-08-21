<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?= h($ticket->subjects) ?> <span style="font-size:16px;margin-top:-5px;" class="badge alert-info"><?= h($ticket->created) ?></span>
            </h1>
        </div>
    </div>

    <div class="container">
        <p>
            <?= h($ticket->content); ?>
        </p>
        <div class="pull-right">
            <?= "Édité le <strong>" . h($ticket->modified) . "</strong>"?>
        </div>
    </div>
</div>
