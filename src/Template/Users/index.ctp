<div class="container">
    <ul class='users'>
        <?php foreach ($users as $user): ?>
            <li class="user grid-m-12">
                <div class="avatar">
                    <div class="grid-12 grid-m-6">
                        <img src="http://perlbal.hi-pi.com/blog-images/55444/gd/1225116859/presentation-de-ma-star-prefere.jpg" alt="Photo de profil Gynidark" width="120">
                    </div>
                </div>
                <div class="user-stats">
                    <div class="grid-12 grid-m-6">
                        <div class="grid-12">
                            <a href="#"><?= h($user->username) ?></a>
                        </div>
                        <div class="grid-4 grid-m-4">
                            <div class="user-stats-info">
                                <i class="fa fa-ticket"></i>
                                <span>2</span>
                            </div>
                        </div>
                        <div class="grid-4 grid-m-4">
                            <div class="user-stats-info">
                                <i class="fa fa-comment-o"></i>
                                <span>2</span>
                            </div>
                        </div>
                        <div class="grid-4 grid-m-4">
                            <div class="user-stats-info">
                                <i class="fa fa-commenting-o"></i>
                                <span>95</span>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
