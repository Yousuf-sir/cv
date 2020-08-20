
<?php
require_once 'header.php';
?>
<?php require_once 'sidebar.php';?>
<section class="resume-section" id="about">

    <div class="resume-section-content">
        <form action="" method="post">
          <h1>ADD EXPERIENCE</h1>
           <input type="hidden" name="about_id" class="form-control" id="heading" value="">
          <div class="form-group">
            <label for="heading">Heading</label>
            <input type="text" name="heading" class="form-control" id="heading" value="">
          </div>

          <div class="form-group">
            <label for="subheading">Sub heading</label>
            <input type="text" name="subheading" class="form-control" id="subheading" value="">
          </div>

          <div class="form-group">
           <label for="discribsion">Discribsion</label>
           <textarea name="discribsion" class="form-control" id="editor" rows="3"></textarea>
         </div>

          <button type="submit" name="aboutinf" class="btn btn-primary">Publish</button>

        </form>

    </div>

</section>
<?php
require_once 'footer.php';
?>
