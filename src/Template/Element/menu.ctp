<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    echo $this->Html->link(
                        $this->Html->image("oranticket.png", array(
                        "alt" => "Logo OranTicket",
                        "width" => "170",

                        "style" => "margin-top:-8px;"
                            )),
                        "/",
                        array(
                            'escape' => false,
                            "class" => "navbar-brand"
                        )
                    );
                ?>
            </div>
            <ul class="nav navbar-right top-nav">

                <?php if ($this->request->session()->read('Auth.User')): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>
                                                <?= $this->request->session()->read('Auth.User.username'); ?>
                                            </strong></h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Il y a 2 minutes</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-footer">
                                <a href="#">Voir tout les messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                            <?= $this->request->session()->read('Auth.User.username'); ?>
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php
                                    echo $this->Html->link(
                                        'Profil',
                                        array(
                                            'controller' => 'Users',
                                            'action' => 'profile'
                                        )
                                    );
                                ?>
                            </li>
                            <li>
                                <a href="#">Paramétre</a>
                            </li>
                            <li class="divider"></li>

                                <?php if ($this->request->session()->read('Auth.User')): ?>
                                    <li>
                                        <?php
                                            echo $this->Html->link(
                                                'Déconnexion',
                                                array(
                                                    'controller' => 'Users',
                                                    'action' => 'logout'
                                                )
                                            );
                                        ?>
                                    </li>
                                <?php endif; ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li>
                        <?php
                            echo $this->Html->link(
                                'Se connecter',
                                array(
                                    'controller' => 'Users',
                                    'action' => 'login'
                                )
                            );
                        ?>
                    </li>
                <?php endif; ?>

            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php if ($this->request->session()->read('Auth.User')): ?>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#ticket">Ticket </a>
                            <ul id="ticket" class="collapse">
                                <li>
                                    <?php
                                    echo $this->Html->link(
                                        'Tous les tickets',
                                        array(
                                            'controller' => 'Tickets',
                                            'action' => 'index'
                                        )
                                    );
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link(
                                        'Mes tickets',
                                        array(
                                            'controller' => 'Tickets',
                                            'action' => 'my'
                                        )
                                    );
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link(
                                        'Ajout d\'un ticket',
                                        array(
                                            'controller' => 'Tickets',
                                            'action' => 'add'
                                        )
                                    );
                                    ?>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if ($this->request->session()->read('Auth.User.role') == 'admin'): ?>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#admin">Administration </a>
                            <ul id="admin" class="collapse">
                                <li>
                                    <a href="#">Tickets</a>
                                </li>
                                <li>
                                    <a href="#">Membres</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link(
                                'Paramétre',
                                array(
                                    'controller' => 'Users',
                                    'action' => 'settings'
                                )
                            );
                            ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>