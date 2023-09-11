<?php 
   session_start();
   include_once('klarna/my_helpers.php');
   include_once('klarna/credentials.php');
   
     ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>U-Flow Gas Buy 2 Get 1 Free</title>
      <link rel="stylesheet" href="styles.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <style>
         .form1{
         margin:2em auto;
         text-align:Center;
         display:block;
         }

         .authorize {
          border-radius: 4px;
          background-color: #e89a26;
          border: none;
          margin: auto;
          padding: 20px;
          width: 300px;
          transition: all 0.5s;
          margin-bottom: 30px;
            margin-left: 25px;
        }
        #klarnaButton img {
         display: block;
        margin-left: auto;
        margin-right: auto;
        width: 500px;
        }
       .klarnaSection {
         text-align: center;
        }
       @media only screen and (max-width:767px){
           #klarna_btn {
  max-width: 100%;
  padding: 15px !important;
}
       }
      </style>
      <!-- Facebook Pixel Code -->
      <script>
         !function(f,b,e,v,n,t,s)
         {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
         n.callMethod.apply(n,arguments):n.queue.push(arguments)};
         if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
         n.queue=[];t=b.createElement(e);t.async=!0;
         t.src=v;s=b.getElementsByTagName(e)[0];
         s.parentNode.insertBefore(t,s)}(window,document,'script',
         'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '2695416074045375');
         fbq('track', 'PageView');
      </script>
      <!-- End Facebook Pixel Code -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://x.klarnacdn.net/kp/lib/v1/api.js" async></script>
   </head>
   <body>
      <?php
         $klarnaProducts = [];
         $klarnaDetail = [];
         
             $klarnaDetail['name'] = "Co2 Capsules";
             $klarnaDetail['quantity'] = 1;
             $product_price = '29.95';
             $quantity_price = $product_price*1;
             $klarnaDetail['unit_price'] = $product_price*100;
             $klarnaDetail['total_amount'] = round($quantity_price, 2);
             $klarnaDetail['total_amount'] = $klarnaDetail['total_amount']*100;
             array_push($klarnaProducts, $klarnaDetail);
         
             $_SESSION['klarnaAmount'] = $product_price * 100;
             $_SESSION['klarnaProducts'] = json_encode($klarnaProducts);
             $client_token = klarnaSession($product_price , $klarnaProducts);
         
           
         
             
         ?>
      <div class="container-fluid topbar">
         <div class="container">
            <div class="row">
               <div class="logo">
                  <a href="index.html"><img src="images/logo-white.png"></a>
               </div>
            </div>
         </div>
      </div>
      <section class="hero">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="arrowheading">
                     <h1>
                        Big Gas Sale<span> Now On!</span>
                     </h1>
                     <img src="images/arrow.png">
                  </div>
                  <div class="co2gas">
                     <img src="images/co2gas.png">
                  </div>
                  <div class="formsection">
                     <div class="formhead">
                        <h3>Buy 2 x Boxes Co2 Capsules &<br> Receive 1 x Box FREE</h3>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                           <input type="hidden" name="cmd" value="_s-xclick" />
                           <input type="hidden" name="hosted_button_id" value="QVQMUVYPM8UYN" />
                           <input type="hidden" name="currency_code" value="GBP" />
                           <input type="image" style=" width: 100%;
                              max-width: 250px;
                              height: auto;
                              margin:30px auto;
                              display: block;
                              text-align: center;" src="images/paypalbutton.png" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Buy Now" />
                        </form>
                     </div>
                  </div>
               </div>
               
            </div>
        
         </div>
         
      </section>
      <section class="aboutus">
         <div class="container">
            <div class="col-md-6">
               <div class="about">
                  <h2>about this product</h2>
                  <p>Please only use U-Flow approved Co2 cartridges in your kegs, as other cartridges could have oils in them.</p>
                  <p>CO2 or Carbon Dioxide is an odourless, colourless, non-inflammable gas with a light sour taste, it does not contain any minerals, salts, or other solid ingredients. Our CO2 Cartridges are filled with 100% pure CO2. Gas cartridges are not refillable. They are made with 100% recyclable steel. Please do not dispose of unused cartridges. Please only use with a device approved for this cartridge and follow the manufacturer’s instructions.</p>
                  <ul>
                     <li>Each Cartridge contains 16gms (20 Cubic cms) of pure CO2.</li>
                     <li>The force required to pierce: 400N max.</li>
                     <li>Thread = 3/8"-24UNF.</li>
                     <li>Cartridge total weight 56gm.</li>
                     <li>Size 88.6mm x 21.9mm</li>
                  </ul>
                  <p>Each Box Contains 10 Co2 Cartridges</p>
               </div>
            </div>
            <div class="col-md-6">
               <div class="aboutimg">
                  <img src="images/product-img.jpg">
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="bigbutton">
                     <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick" />
                        <input type="hidden" name="hosted_button_id" value="QVQMUVYPM8UYN" />
                        <input type="hidden" name="currency_code" value="GBP" />
                        <input type="image" style=" width: 100%;
                           max-width: 650px;
                           height: auto;
                           margin:30px auto;
                           display: block;
                           text-align: center;" src="images/bigbutton.png" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Buy Now" />
                     </form>
                  </div>
               </div>
            </div>
         </div>
      
      </section>
          <div class="part-3">
            <!-- Klarna Button -->
            <div class="klarnadiv" id="klarnaButton">
               <img src="klarna_button.png" id="klarna_btn"> 
               <p style="font-size: 20px; text-align: center;">Pay later in 3 interest-free instalments of £ <?php  echo round($product_price/3,2);?></p>
            </div>
            <div class="klarnaSection" style="margin-top: 20px;">
               <div id="klarna_container"> </div>
               <div>
                  <button class="authorize">Buy Now</button>
               </div>
            </div>
         </div>
      <div >
      </div>
      <script>
         $(document).ready(function(){
             $('.klarnaSection').hide();
             $(document).on('click','#klarnaButton',function(e){
                 $(this).hide();
                 $('.klarnaSection').fadeIn();
             });
         
         
             window.klarnaAsyncCallback = function () {
                 Klarna.Payments.init({ 
                     client_token: '<?php echo $client_token;?>'
                 });
                 console.log("Payments initialized");
         
                 //The following method loads the payment_method_category in the container with the id of 'klarna_container'
                 Klarna.Payments.load({
                     container: '#klarna_container',
                     payment_method_category: 'pay_over_time'
                 
                 }, function(res){
                     console.log("Load function called")
                     console.debug(res);
                 });
         
             };
         
             $(document).on('click',"button.authorize", function(e){
                 Klarna.Payments.authorize({
                     payment_method_category: 'pay_over_time'
                 }, 
                 {
         
                     order_amount: "<?php echo $product_price*100;?>",
                     order_lines: <?php echo json_encode($klarnaProducts);?>,
                 }, function(res) {
                         console.log("Response from the authorize call:")
                         console.log(res);
                        //  console.log(base_url+"klarna/getAuthorizationToken/"+res.authorization_token);
                         $.ajax({
                             url: "/klarna/my_helpers.php?action=getAuthorizationToken"+res.authorization_token,
                             type: "GET",
                             dataType: 'json',
                             success: function (data) {
                                 console.log('getAuthorizationToken');
                                 console.log(data);
                                 if(data.response){
                                    //  swal({
                                    //      title: "Success",
                                    //      text: "Payment processed successfully.",
                                    //      icon: "success",
                                    //      }).then((value) => {
                                    //      if (value) {
                                    //          var redirect_url = base_url+"klarna/confirmation";
                                    //           window.location.replace(redirect_url);
                                    //      }
                                    //  });
                                 }
                             }
                         });
                     }
                 );
             });
         
         });
      </script>
      <section class="footer">
         <div class="footer-bottom">   
            Copyright 2023 U-Flow Ltd. <span> - All Rights Reserved - </span>
         </div>
      </section>
   </body>
</html>