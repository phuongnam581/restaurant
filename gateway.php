<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./public/source/assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Trang Thanh Toán</title>
</head>
<body>
  <div class="container">
    <h2 class="my-4 text-center">THANH TOÁN ONLINE</h2>
    <form action="./charge.php" method="post" id="payment-form">
      <div class="form-row">
       <!-- <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name"> -->
       <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Tên Trên Thẻ">
       <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Địa Chỉ Email">
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button>Thanh Toán</button>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./public/source/assets/js/charge.js"></script>
</body>
</html>