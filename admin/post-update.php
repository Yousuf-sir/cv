<?php
require_once 'header.php';
?>
<?php
     if(isset($_POST['addnewpost'])){
       $postmgs = $post->add_new_post( $_POST );
     }

?>
<?php
require_once 'sidebar.php';
?>
<section class="resume-section" id="about">

    <div class="resume-section-content">
        <?php
          $views =  $post->post_edit_info ();

           if( $views ) :

              while($view = $views->fetch_assoc() ):
        ?>

        <form action="" method="post">
          <span>
             <?php
                  if(isset(  $postmgs )){
                    foreach ( $postmgs as $key => $value ) {
                      echo $key." => ".$value;
                    }
                  }
             ?>
          </span>
          <div class="form-group">
            <label for="post_title">Heading</label>
            <input type="hidden" name="post_id" class="form-control" id="post_title" value="<?= $view['post_id'];?>">
            <input type="text" name="post_title" class="form-control" id="post_title" value="<?= $view['post_title'];?>">
          </div>

          <div class="form-group">
            <label for="post_subtitle">Sub heading</label>
            <input type="text" name="post_subtitle" class="form-control" id="post_subtitle" value="<?= $view['post_subtitle'];?>">
          </div>

          <div class="form-group">
            <label for="post_category">Catrgory</label>
            <input type="text" name="post_category" class="form-control" id="post_category" value="<?= $view['post_category'];?>">
          </div>

          <div class="form-group">
           <label for="post_body">Discribsion</label>
           <textarea name="post_body" class="form-control" id="editor" rows="3"><?= $view['post_body'];?></textarea>
         </div>

          <button type="submit" name="addnewpost" class="btn btn-primary">Update</button>

        </form>
      <?php endwhile;endif;?>



    </div>

</section>
<?php
require_once 'footer.php';
?>
