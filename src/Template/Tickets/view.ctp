<div class="container">
    <div class="posts">
        <div class="post">
            <div class="post-title">
                <!--  Si le ticket est résolu, icon star -->
                <h1><?= h($ticket->subjects) ?><i class="fa fa-star-o right"></i></h1>

            </div>

            <div class="post-author">
                <?php
                    if(!empty($user->avatar)){
                        echo $this->Html->image('upload/avatars/'. $user->avatar, ['width' => '65']);

                    }else{
                        echo $this->Html->image('upload/avatars/avatar_default.png',['width' => '65']);
                    }
                ?><span>Gynidark</span>
            </div>

            <div class="post-content">
                <p><?= nl2br(h($ticket->content)); ?></p>
            </div>

            <div class="post-comments">
                <div class="post-list">
                    <?php foreach ($ticket->comments as $comment): ?>
                        <div class="container">
                            <div class="grid-1">
                                <?php
                                if(!empty($user->avatar)){
                                    echo $this->Html->image('upload/avatars/'. $ticket->user->avatar, ['class' => 'media-object', 'width' => '64']);

                                }else{
                                    echo $this->Html->image('upload/avatars/avatar_default.png');
                                } ?>
                            </div>

                            <div class="grid-11">
                                <h4 class="media-heading"><span class="label label-default"> <?= $ticket->user->username; ?> </span>
                                    <small> 22/08/2015 22:13:54</small>
                                </h4>
                                <?= $comment['content']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?= $this->Form->create('Comments') ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('user_id', ['type' => 'hidden']); ?>
                        <?php
                            echo $this->Form->input('content', ['type' => 'textarea', 'id' => 'trumbowyg']);
                        ?>
                    </div>
                <?= $this->Form->button(__('Ajouter le commentaire'), ['class' => 'btn btn-success', 'style' => 'margin-right: 25px;']) ?>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
