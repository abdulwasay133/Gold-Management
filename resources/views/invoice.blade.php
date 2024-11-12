<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
  <title>Print</title>
</head>
<body>
<!-- <div class="container"> -->
  <div class="row mt-5">
<div class="col-md-12 mx-auto">
  <div class="card">
  <div class="card-body mx-4">
    <div class="container">
      <p class="my-5 mx-5" style="font-size: 30px;">Kamran Jewellers & Gold Test Lab</p>
      <div class="row">
        <ul class="list-unstyled">
          <li class="text-black">Name : ___________________________</li><br>
          <li class="text-muted mt-1"><span class="text-black">Other :</span>________________________________________</li>
          <li class="text-black mt-1">{{Carbon\Carbon::now()->format('d-M-Y')}}</li>
        </ul>
        <hr>
        <div class="col-xl-8">
          <p>1 Tola Price</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end" id="onetola">$199.00
          </p>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-xl-8">
          <p>Gold Weight</p>
        </div>
        <div class="col-xl-4">
          <p class="float-end" id="gm">$100.00
          </p>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-xl-8">
          <p>Price</p>
        </div>
        <div class="col-xl-4">
          <p class="float-end" id="price">$10.00
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="row text-black">

        <div class="col-xl-12">
          <p class="float-end fw-bold" id="total">Total: $10.00
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="text-center" style="margin-top: 90px;">
        <a><u class="text-info">www.kamranjewellers.com</u></a>
        <p>Thank you for your Business from Kamran Jewellers. Please let us know if we can do anything else for you!</p>
      </div>

    </div>
  </div>
</div>


  </div>
  </div>
<!-- </div> -->


<script>
onetola = document.querySelector('#onetola').innerHTML = localStorage.getItem("onetola");
gm = document.querySelector('#gm').innerHTML = localStorage.getItem("gm")+"Gm";
price = document.querySelector('#price').innerHTML = localStorage.getItem("price");
total = document.querySelector('#total').innerHTML ="Total: " +localStorage.getItem("price");
</script>



</body>
</html>
