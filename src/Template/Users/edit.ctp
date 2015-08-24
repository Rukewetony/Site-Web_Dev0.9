<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Users - Édition du profil
            </h1>
        </div>
    </div>
    <?= $this->Form->create($user) ?>
    <fieldset>
            <div class="col-md-12">
                <?php
                    echo $this->Form->input('username', ['class' => 'form-control']);
                    echo $this->Form->input('password', ['class' => 'form-control', 'style' => "margin-bottom: 10px"]);
                ?>
            </div>
            <div class="col-md-2">
                <?php
                    if(!empty($user->avatar)){
                        echo $this->Html->image('upload/avatars/'. $user->avatar, ['width' => '130']);
                    }else{
                        echo $this->Html->image('upload/avatars/avatar_default.png', ['width' => '130']);
                    }
                ?>
            </div>
            <div class="col-md-10" style="margin-top: 40px">
                <?= $this->Form->input('avatar_file', ['type' => 'file', 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-12">
                <?php
                    echo $this->Form->input('website', ['class' => 'form-control']);
                    echo $this->Form->input('mail', ['class' => 'form-control']);

                    if ($this->request->session()->read('Auth.User.role') == 'admin'){
                        echo $this->Form->input('role', ['class' => 'form-control',
                            'options' => ['admin' => 'Admin', 'member' => 'modo','Modo' => 'Member'
                        ]]);
                    }
                ?>
            </div>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
