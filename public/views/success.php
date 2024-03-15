<?php
require_once('vendor/autoload.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $options = new \Iyzipay\Options();
  $options->setApiKey("sandbox-Xd2YrQOCIeVCv4f01KR8tFFbripmByXt");
  $options->setSecretKey("sandbox-FTyZIVtSFwYzWn8WW56CZ0zK3MHNGrbv");
  $options->setBaseUrl("https://sandbox-api.iyzipay.com");
          
  $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
  $request->setLocale(\Iyzipay\Model\Locale::TR);
  $request->setConversationId("123456789");
  $request->setToken($_POST['token']);

  $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, $options);

  if($checkoutForm->getStatus() == "success") {
    echo "Ödeme başarılı";
    print_r($checkoutForm);
  } else {
    echo "Ödeme başarısız";
  }
}

?>
