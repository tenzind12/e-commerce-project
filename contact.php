<?php
include 'inc/header.php';?>

<div class="main my-5 py-5 px-3">
  <!-- first section -->
  <div class="row">
    <div class="col-sm-8">
      <h3>Live Support</h3>
      <p>
        <span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span>
      </p>
      <small class="text-muted lead">
        It is a long established fact that a reader will be distracted by the readable content of a
        page when looking at its layout. The point of using Lorem Ipsum is that it has a
        more-or-less normal distribution of letters.There are many variations of passages of Lorem
        Ipsum available, but the majority have suffered alteration in some form, by injected humour,
        or randomised words which don't look even slightly believable. If you are going to use a
        passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the
        middle of text.
      </small>
    </div>
    
    <picture>
      <img src="img/contact.png" class="img-fluid d-none d-sm-block  " alt="...">
    </picture>
  </div>

  <!-- second section -->
  <div class="row">
    <div class="col-sm-6 mt-5">
      <div class="form-group">
        <label for="name">NOM & PRENOM</label>
        <input class="form-control" type="text" name="name" />
      </div>
      <div class="form-group">
        <label for="email">E-MAIL</label>
        <input class="form-control" type="text" name="email" />
      </div>
      <div class="form-group">
        <label for="phone">NO. PORTABLE</label>
        <input class="form-control" type="text" name="phone" />
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">COMMENTAIRE</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <input type="submit" class="btn btn-outline-success btn-lg float-right" value="SUBMIT" />
    </div>

    <div class="col-sm-2"></div>

    <address class="col-sm-4 mt-5 lead">
      <h3>Company Information</h3>
      <p>500 rue du Lorem Ipsum</p>
      <p>12345 Lorem</p>
      <p>France</p>
      <p>Téléphone:+33 75-89-12-47 0</p>
      <p>Email:
        <u>info@loremcompany.com</u>
      </p>
      <p>Réseaux Sociale:
        <u>Facebook</u>,<u> Instagram</u>
      </p>
    </address>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
