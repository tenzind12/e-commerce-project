<?php
    require_once "stripe-php-master/init.php"; // stripe php github

    $stripeDetails = array(
        "secretKey" => "sk_test_51KAuPUAKBlCe0kMMHihYXBQQ38pZkaOxIGEDCaSTFstiWI4prNkee0djFNCZ5yRR05iZGV1QpEEeDUopwkNjZUvq00JrvJ7u1a",
        "publishableKey" => "pk_test_51KAuPUAKBlCe0kMM28dRBK87PLmH9wZicPdMZCAXopbyM4yRnhy4BTWOL4BdcXoCcHQGRtbc5OgYppgN5qaYo1IP00WXvCGocO"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>