<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Clarence Taylor</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <?php
                     $postshow = $post->postget();

                      if ( $postshow ):

                         while( $view = $postshow->fetch_assoc() ):

                           $id = explode(" ",$view['post_category']);

                   ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#<?= strtolower($id[0]); ?>"><?= $view['post_category']; ?></a></li>
                    
                <?php endwhile;endif;?>
                </ul>
            </div>
</nav>
