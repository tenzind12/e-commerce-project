<?php 
    include 'inc/header.php'; 
    include './payment/config.payment.php';    
?>
<?php 
    if(Session::get('cusLogin') == false) header('Location: login.php'); 
    
    $getCart           = $cart->getAllCart();
    if($getCart) $cart = $getCart->fetch();

    $getCombinedCusDetails           = $user->getCombinedCusDetails(Session::get('cusId'));
    if($getCombinedCusDetails) $rows = $getCombinedCusDetails->fetch();

    $token              = $_POST['stripeToken'];
    $cusName            = $rows['customerName'];
    $token_card_type    = $_POST['stripeTokenType'];
    $phone              = $rows['phone'];
    $email              = $_POST['stripeEmail'];
    $address            = $rows['address'];
    $amount             = $cart['amount']*$cart['quantity'];
    $desc               = $_cart['courseName'];
    $charge             = \Stripe\Charge::create([
                            "amount" => str_replace(",","",Session::get('totalPrice')) * 100,
                            "currency" => 'eur',
                            "description"=>$desc,
                            "source"=> $token,
                        ]);
  
      if($charge){
          var_dump($getCombinedCusDetails);
      }

    
?>



<?php include 'inc/footer.php'; ?>