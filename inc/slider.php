<div class="row my-3" id="header_bottom">
  <!-- first section before the slide -->
  <div class="col-lg header_bottom_left d-none d-sm-block">
    <div class="four-grid row">
      
      <!-- each sections -->
      <?php
        $php = $course->getCourseByName('php');
        if($php) {
          while($rows = $php->fetch()) {
      ?>
            <div class="image-groups col-sm rounded">
              <div class="row">
                <a href="preview.php?id=<?= $rows['courseId'] ?>"><img src="admin/<?= $rows['image'] ?>" alt="image broken" class="image-hover rounded"/></a>
                <div class="row-para">
                  <!-- <h3 class=" ">HTML</h3> -->
                  <p><?= $fm->shortenText($rows['description'], 50) ?></p>
                  <a href="preview.php?id=<?= $rows['courseId'] ?>" class="image-btns btn btn-outline-warning">Add to Cart</a>
                </div>
              </div>
            </div>
      <?php
          }
        }
      ?>
      
      <!-- each sections -->
      <?php
        $reactJs = $course->getCourseByName('react js');
        if($reactJs) {
          while($rows = $reactJs->fetch()) {
      ?>
            <div class="image-groups col-sm rounded">
              <div class="row">
                <a href="preview.php?id=<?= $rows['courseId'] ?>"><img src="admin/<?= $rows['image'] ?>" alt="image broken" class="image-hover rounded"/></a>
                <div class="row-para">
                  <!-- <h3 class=" ">HTML</h3> -->
                  <p><?= $fm->shortenText($rows['description'], 50) ?></p>
                  <a href="preview.php?id=<?= $rows['courseId'] ?>" class="image-btns btn btn-outline-warning">Add to Cart</a>
                </div>
              </div>
            </div>
      <?php
          }
        }
      ?>

      <div class="w-100"></div>
      
      <!-- each sections -->
      <?php
        $html = $course->getCourseByName('html');
        if($html) {
          while($rows = $html->fetch()) {
      ?>
            <div class="image-groups col-sm rounded">
              <div class="row">
                <a href="preview.php?id=<?= $rows['courseId'] ?>"><img src="admin/<?= $rows['image'] ?>" alt="image broken" class="image-hover rounded"/></a>
                <div class="row-para">
                  <!-- <h3 class=" ">HTML</h3> -->
                  <p><?= $fm->shortenText($rows['description'], 50) ?></p>
                  <a href="preview.php?id=<?= $rows['courseId'] ?>" class="image-btns btn btn-outline-warning">Add to Cart</a>
                </div>
              </div>
            </div>
      <?php
          }
        }
      ?>

      <!-- each sections -->
      <?php
        $css = $course->getCourseByName('css');
        if($css) {
          while($rows = $css->fetch()) {
      ?>
            <div class="image-groups col-sm rounded">
              <div class="row">
                <a href="preview.php?id=<?= $rows['courseId'] ?>"><img src="admin/<?= $rows['image'] ?>" alt="image broken" class="image-hover rounded"/></a>
                <div class="row-para">
                  <!-- <h3 class=" ">HTML</h3> -->
                  <p><?= $fm->shortenText($rows['description'], 50) ?></p>
                  <a href="preview.php?id=<?= $rows['courseId'] ?>" class="image-btns btn btn-outline-warning">Add to Cart</a>
                </div>
              </div>
            </div>
      <?php
          }
        }
      ?>
    </div>
  </div>

  <!------------------------------ the slider  ---------------------------->
  <div class="col-lg m-2">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <!-- the indicator visual -->
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <?php for($i = 1; $i <= 5; $i++) {
          echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
        } ?>
      </ol>

      <div class="carousel-inner">
        <?php
          $getImages = $course->getAllCourse();
          if($getImages) {
            $i = 0;
            while($i <= 5 &&  $rows = $getImages->fetch()) {
              $i++;
        ?>
        <div class="carousel-item <?= $i == 1 ? 'active' : '' ?>">
          <img class="d-block w-100" src="admin/<?= $rows['image'] ?>" style="max-height: 100%">
        </div>
        <?php
            }
          }
        ?>

      </div>
    </div>
    <p class="mt-5 border border-dark p-5 rounded"><em>Go deeper and learn job-ready
       skills with our Pro-exclusive Paths. Earn a certificate of completion for 
       every Path finished.</em>
    </p>
  </div>
</div>
