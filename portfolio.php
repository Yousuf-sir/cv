<?php
   $postshow = $post->postget();

    if ( $postshow ):

       while( $view = $postshow->fetch_assoc() ):

         $id = explode(" ",$view['post_category']);

 ?>

<section class="resume-section" id="<?= strtolower($id[0]); ?>">
    <div class="resume-section-content">
        <h1 class="mb-0">
              <?= $view['post_category']; ?>
              <!--<span class="text-primary"></span>-->
                    </h1>
                    <div class="subheading mb-5">
                       <?= $view['post_title']; ?>
                        <!--<a href="mailto:name@email.com">name@email.com</a>-->
                    </div>
                    <p class="lead mb-5">
                        <?= $view['post_body']; ?></p>
                    <div class="social-icons">

                        <a class="social-icon" href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>


                        <a class="social-icon" href="#"><i class="fab fa-github"></i></a>


                        <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>


                        <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>

                    </div>
      </div>

</section>
<?php endwhile;endif;?>
