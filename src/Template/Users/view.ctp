<div class="profil">
    <div class="profil-header">
        <div class="container">
            <div class="grid-4 center">
                <div class="grid-6 grid-m-5">
                    <img src="http://perlbal.hi-pi.com/blog-images/55444/gd/1225116859/presentation-de-ma-star-prefere.jpg" alt="Photo de profil Gynidark" width="110">
                </div>
                <div class="grid-6 grid-m-7">
                    <div class="profil-name">
                        <h2><?= $user->username; ?></h2>
                        <span><?= $user->role; ?></span>
                    </div>
                </div>
            </div>

            <div class="grid-8">
                <div class="grid-12">
                    <div class="profil-stats">

                        <div class="grid-3 grid-m-4">
                            <h2>4</h2>
                            <span>Commentaires</span>
                        </div>
                        <div class="grid-3 grid-m-4">
                            <h2><?= $tickets_count; ?></h2>
                            <span>Tickets</span>
                        </div>

                        <div class="grid-3 grid-m-4">
                            <h2>3</h2>
                            <span>Tickets résolus</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab">
    <div class="container">
        <ul class="tabs">
            <li class="active">
                <a href="#">A propos</a>
            </li>
            <li>
                <a href="#">Tickets</a>
            </li>

            <li class="right">
                <a href="#" id="edit_avatar">Éditer mon profil</a>
            </li>
        </ul>
        <div id="container">
            <section>
                <p>
                    <div class="grid-6">
                        <div class="grid-12 profil-about">
                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Site web</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-link"></i> gynidark.github.io</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Github</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-github"></i> Gynidark</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Twitter</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-twitter"></i> Gynidark</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Facebook</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-facebook"></i> Gynidark</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Sexe</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-male"></i> Homme</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Emplacement</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-map-marker"></i> Paris</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-6">
                        <div class="grid-12 profil-about">
                            <h4>Biographie</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque adipisci recusandae omnis mollitia, enim hic cum et facere ipsa saepe ipsam voluptatum quia quam labore sed, quaerat. Ab, consequuntur necessitatibus.
                            </p>
                        </div>
                    </div>
                </p>
            </section>
            <section>
                <p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sujet</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Gros souci sur CakePHP</a></td>
                                <td><span class="label label-success">Ouvert</span></td>
                                <td>23/08/2015 21:19:40</td>
                                <td class="action">
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="#"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                                <tr>
                                    <td><a href="#">Gros souci sur CakePHP</a></td>
                                    <td><span class="label label-success">Ouvert</span></td>
                                    <td>23/08/2015 21:19:40</td>
                                    <td class="action">
                                        <a href="#"><i class="fa fa-eye"></i></a>
                                        <a href="#"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="#"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </p>
            </section>

            <section>
                <div class="container">
                    <div class="grid-6">
                        <div class="grid-12 profil-about">
                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Site web</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-link"></i> gynidark.github.io</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Github</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-github"></i> Gynidark</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Twitter</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-twitter"></i> Gynidark</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Facebook</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-facebook"></i> Gynidark</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Sexe</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-male"></i> Homme</a></span>
                                </div>
                            </div>

                            <div class="container">
                                <div class="grid-4 grid-m-4">
                                    <span>Emplacement</span>
                                </div>
                                <div class="grid-8 grid-m-8">
                                    <span><a href="#"><i class="fa fa-map-marker"></i> Paris</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-6 ">
                        <div class="grid-12 profil-about">
                            <div class="grid-12">
                                <span>Votre prénom</span>
                                <input type="text" class="text">
                            </div>
                            <div class="grid-12">
                                <span>Votre e-mail</span>
                                <input type="text" class="text">
                            </div>
                            <div class="grid-12">
                                <span>Votre avatar</span><br>
                                <input type="file" class="profil_upload">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-12">
                    <input type="submit" class="btn btn-success" style="width: 100%;" value="Sauvegarder mon profil">
                </div>
            </section>
        </div>
    </div>
</div>
