<?php
require_once('vendor/autoload.php');

function gen_uuid() {
  return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      // 32 bits for "time_low"
      mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

      // 16 bits for "time_mid"
      mt_rand( 0, 0xffff ),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 4
      mt_rand( 0, 0x0fff ) | 0x4000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      mt_rand( 0, 0x3fff ) | 0x8000,

      // 48 bits for "node"
      mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
  );
}

$package_slug = $_GET['package'] ?? '';

$mysqli = new mysqli("localhost", "root", "", "solidtemp");

if ($mysqli->connect_error) { 
  die("Connection failed: " . $mysqli->connect_error); 
}

$stmt = $mysqli->prepare("SELECT * FROM package WHERE slug = ?");
$stmt->bind_param("s", $package_slug);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$mysqli->close();

$ipAdress = $_SERVER['REMOTE_ADDR'];

$currentDate = date('Y-m-d H:i:s');

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment']) && $result->num_rows > 0) {
  echo "Ödeme ekranına yönlendiriliyorsunuz...";
  $_POST['registirationdate'] = date('Y-m-d H:i:s');
  echo gen_uuid();
  echo $_POST['name'];
  $options = new \Iyzipay\Options();
  $options->setApiKey("sandbox-Xd2YrQOCIeVCv4f01KR8tFFbripmByXt");
  $options->setSecretKey("sandbox-FTyZIVtSFwYzWn8WW56CZ0zK3MHNGrbv");
  $options->setBaseUrl("https://sandbox-api.iyzipay.com");
          
  // $request->setConversationId(uniqid());
  $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
  $request->setLocale(\Iyzipay\Model\Locale::TR);
  $request->setConversationId(gen_uuid());
  $request->setPrice("1");
  $request->setPaidPrice("1.2");
  $request->setCurrency(\Iyzipay\Model\Currency::TL);
  $request->setBasketId(gen_uuid());
  $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
  $request->setCallbackUrl("http://localhost/sporttime_template/public/success");
  $request->setEnabledInstallments(array(2, 3, 6, 9, 12));

  $userUuid = gen_uuid();

  $buyer = new \Iyzipay\Model\Buyer();
  $buyer->setId($userUuid);
  $buyer->setName($_POST['name']);
  $buyer->setSurname($_POST['surname']);
  $buyer->setGsmNumber("+905350000000");
  $buyer->setEmail($_POST['email']);
  $buyer->setIdentityNumber($_POST['identity']);
  $buyer->setLastLoginDate($currentDate);
  $buyer->setRegistrationDate($_POST['registirationdate']);
  $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
  $buyer->setIp($ipAdress);
  $buyer->setCity("Istanbul");
  $buyer->setCountry("Turkey");
  $buyer->setZipCode("34732");
  $request->setBuyer($buyer);

  $shippingAddress = new \Iyzipay\Model\Address();
  $shippingAddress->setContactName("Jane Doe");
  $shippingAddress->setCity("Istanbul");
  $shippingAddress->setCountry("Turkey");
  $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
  $shippingAddress->setZipCode("34742");
  $request->setShippingAddress($shippingAddress);

  $billingAddress = new \Iyzipay\Model\Address();
  $billingAddress->setContactName("Jane Doe");
  $billingAddress->setCity("Istanbul");
  $billingAddress->setCountry("Turkey");
  $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
  $billingAddress->setZipCode("34742");
  $request->setBillingAddress($billingAddress);

  $basketItems = array();
  $firstBasketItem = new \Iyzipay\Model\BasketItem();
  $firstBasketItem->setId("BI101");
  $firstBasketItem->setName("Binocular");
  $firstBasketItem->setCategory1("Collectibles");
  $firstBasketItem->setCategory2("Accessories");
  $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
  $firstBasketItem->setPrice("1");
  $basketItems[0] = $firstBasketItem;
  $request->setBasketItems($basketItems);
  

  $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $options);

  header('Location: ' . $checkoutFormInitialize->getPaymentPageUrl());
}  
?>

<div class="sign">
      <h2 class="sign__title">ÜYELİK OLUŞTUR</h2>
      <section class="sign-form">
        <form class="sign-form__info" action="" method="post">
          <div class="sign-form__field">
            <label for="identity">TC Kimlik No</label>
            <input type="text" name="identity" id="identity" />
          </div>
          <div class="sign-form__field">
            <label for="name">Ad</label>
            <input type="text" name="name" id="name" required />
          </div>
          <div class="sign-form__field">
            <label for="surname">Soyad</label>
            <input type="text" name="surname" id="surname" />
          </div>
          <div class="sign-form__field">
            <label for="phone">Cep Telefonu</label> 
            <input type="text" name="tel" id="phone" />
          </div>
          <div class="sign-form__field">
            <label for="email">Email Adresi</label>
            <input type="text" name="email" id="email" />
          </div>
          <div class="sign-form__field">
            <label for="city">Şehir</label>
            <input type="text" name="city" id="city">
          </div>
          <div class="sign-form__field">
            <label for="state">İlçe</label>
            <input type="text" name="state" id="state">
          </div>
          <div class="sign-form__field">
            <label for="adress">Adres</label>
            <textarea name="adress" id="adress" cols="30" rows="10"></textarea>
          </div>
          <div class="sign-form__field">
            <label for="zipcode">Posta Kodu</label>
            <input type="text" name="zipcode" id="zipcode" />
          </div>
          <div class="sign-form__field">
            <label for="">Cinsiyet</label>
            <select name="gender" id="">
              <option selected value="">Seçiniz</option>
              <option value="0">Erkek</option>
              <option value="1">Kadın</option>
            </select>
          </div>
          <div class="sign-form__field">
            <label for="">Doğum Tarihi</label>
            <input type="date" name="birthdate" />
          </div>
          <div class="sign-form__field">
            <label for="">Üyelik Başlangıç Tarihi</label>
            <input type="date" name="registirationdate" />
          </div>
          <button type="submit" name="payment" class="pay">pay</button>
        </form>
        <div class="package">
          <div class="package__top">
            <h4 class="package__top-desc">Seçtiğiniz Paket</h4>
            <a class="package__top-change" href="./price.html">Değiştir</a>
          </div>
          <div class="package__current">
            <h3><?php echo $row['title']; ?></h3>
            /
            <h3>₺<?php echo $row['price']; ?></h3>
          </div>
          <button class="btn-secondary" name="payment" type="submit">ÖDEME EKRANI</button>
        </div>
      </section>
      
      
</div>
<script>
  const payment = document.querySelector('.btn-secondary');
  const pay = document.querySelector('.pay');

  payment.addEventListener('click', () => {
    console.log('clicked');
    pay.click();
  });
</script>