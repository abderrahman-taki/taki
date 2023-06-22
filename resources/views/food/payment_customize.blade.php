@extends('layouts.app')

@section('content')

    
    <div class="popular_places_area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title ">
                        <h3>The price to pay is : {{$customize->price}} MAD</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card-footer text-center stylepayment">
                        <div id="paypal-button-container"></div>
                    </div>                
                </div>  
            </div>
        </div>
    </div>
 <!-- Include the PayPal JavaScript SDK -->

 <script
 src="https://www.paypal.com/sdk/js?client-id=AesVFEa8mpwxsl2icCTIiyQm7qRWzFp-fikGRkBzBJaXrxTKJiyO7ywWpK9fwANeSOVf6vdXoh3Mfv2X"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>


<script>
 paypal.Buttons({
 // Set up the transaction
 createOrder: function(data, actions) {
         return actions.order.create({
             purchase_units: [{
                 amount: {
                     value: '{{$customize->price}}'
                 }
             }]
         });
     },
     onApprove: function(data, actions) {
         return actions.order.capture().then(function(details) {
             alert('Transaction completed by ' + details.payer.name.given_name + '!');
             location.replace("{{route('paymentSuccessCustom',['language'=>app()->getLocale(),'id'=>$customize->id])}}");
         });
     }
 }).render('#paypal-button-container');
 // This function displays Smart Payment Buttons on your web page.
</script>

@endsection
