<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use frontend\models\Listingdetails;
use frontend\models\Categorydetails;
use frontend\models\ShoeImage;
use frontend\models\Cart;
use common\models\User;

$totalprice=Cart::find()->joinWith('listing')->sum('price');
$totalitems=Cart::find()->joinWith('listing')->sum('userId');

$userId = user::find()->where(['id'=>Yii::$app->user->id])->one();

?>
<script>
function analyzeColor2(myColor) {
  if (myColor == "card") {
    alert("Payment successfully made!");
    }
    else if(myColor == "mpesa") {
      alert("Check your phone request has successfully been sent!")
    }
  function displayModal(){
      $('myModal').modal('show')    
    }
}
</script>


  <div class="col d-flex justify-content-center">
    <div class="card shadow">
    <div class="card-body">
      <h5 class="card-title">Client Name: +254712345678</h5>
      <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i> Ruiru Townhouse Duka,  Ruiru Town Townhouse building Ground Floor Room Number 4 Opposite Figshade Hotel, Cellphone: 723456789 Ruiru, Kiambu</p>
      <h1>Payment Method</h1> 
      <h6 class="text-muted">Trusted payment, 100% Money Back Guarantee</h6>
      <form action="#">
          <!-- Input trigger order now modal -->
        <input type="radio" id="mpesa" name="payment" value="mpesa" data-toggle="modal" data-target="#myModal"><label for="mpesa">Mpesa</label> <img src="<?= Yii::$app->request->baseUrl ?>/images/mpesa.png?>" class="thumb" alt="Mpesa">
        
          <!-- Modal -->
          <div class="modal fade pesa" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" style="margin-left: 60px;">M-PESA Account</h4>  <br>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                 <p>Confirm Phone No. then click "Proceed" to generate payment request to your phone</p>
                 <p>Enter Your MPESA PIN on prompt pop-up on your phone to complete the payment</p>
                 <label style="line-height: 4em;">+254712345678</label>
                <div class="mode ">
                <div class="modal-footer">
                  <a href="<?= Url::to(['checkout/create', 'user'=>$userId->username ])?>"><button type="button" id="mpesa" value="mpesa"  class="btn btn-primary" onclick="analyzeColor2(this.value);">Proceed</button></a>        

                </div>
              </div>
              </div>
              </div>
            </div>
          </div><!-- / Order Now modal-->

        <br>
        <input type="radio" id="card" name="payment" value="card" onclick="analyzeColor2(this.value);"> <label for="female">Card</label> <img src="<?= Yii::$app->request->baseUrl ?>/images/vima.jpeg?>" class="thumb" alt="Payment Cards">
      </form>
      <hr class="line">
        
       <div class="row invoice">
        <div class="col-md-8">
          <h2>Total Amount:  Ksh <?= $totalprice?></h2>
        </div>
        <div class="col-md-4 ">
          <a href="<?= Url::to(['checkout/create'])?>"> <button class="btn btn-outline pull-right">Create Invoice</button></a>
       </div>
      </div>
    </div>
  </div>
  </div>
