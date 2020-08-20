<?php
     if(isset($_POST['addnewpost'])){
       $postmgs = $post->add_new_post( $_POST );
     }

?>

<section class="resume-section" id="about">

    <div class="resume-section-content">
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
            <input type="text" name="post_title" class="form-control" id="post_title">
          </div>

          <div class="form-group">
            <label for="post_subtitle">Sub heading</label>
            <input type="text" name="post_subtitle" class="form-control" id="post_subtitle">
          </div>

          <div class="form-group">
            <label for="post_category">Catrgory</label>
            <input type="text" name="post_category" class="form-control" id="post_category">
          </div>

          <div class="form-group">
           <label for="post_body">Discribsion</label>
           <textarea name="post_body" class="form-control" id="editor" rows="3"></textarea>
         </div>

          <button type="submit" name="addnewpost" class="btn btn-primary">Publish</button>

        </form>

        <hr class="m-0" />
        <br><br>

      <table class="table table-hover table-dark">
       <thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">Heading</th>
           <th scope="col" colspan="2">Action</th>

         </tr>
       </thead>
       <tbody>
         <?php
            $postshow = $post->postget();

             if( $postshow ):
                $i = 1;
                while( $view = $postshow->fetch_assoc() ):

          ?>

         <tr>
           <td> <?= $i++; ?> </td>
           <th> <?= $view['post_title']; ?> </th>
           <td><a href="post-update.php?postedit=<?= $view['post_id']; ?>">Edit</a></td>
           <td>

             <?php
              if( isset($_POST['submit'])){
                $deletepost = $post->delete_post ( $_POST );
             } ?>

              <form action="" method="post">
                <input type="hidden" name="action" value="action">
                <input type="hidden" name="post_id" value="<?= $view['post_id']; ?>">
                <input type="submit" name="submit" value="Delete">

           </form>
         <?php endwhile; endif; ?>
         </td>

       </tr>
        

     </tbody>
    </table>


  </div>

</section>
<?php
require_once 'footer.php';
?>
