<h1 class"align-center">Donations</h1>
<h6>New Donation</h6>
<hr>
<form action="" method="post" id="donationForm">
  <div id="message"></div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Recipient/Institution</label>   
            <select id="recipient" name="recipient" class="form-control">
            <option selected>Choose...</option>

            <?php 
        
                if(isset($recipientsList) && is_array($recipientsList) && count($recipientsList) > 0){
                    foreach ($recipientsList as $value) {
                        
                    ?>
                <option value="<?php echo $value["recipient_id"]; ?>"><?php echo $value['name']; ?></option>  
            <?php
            }
                }
            ?>
            
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" placeholder="amount">
        </div>
        <div class="form-group">
    <label for="inputState">Country</label>   
    <select id="country" name="country" class="form-control">
      <option selected>Choose...</option>
      <?php 
 
        if(isset($countriesList) && is_array($countriesList) && count($countriesList) > 0){
            foreach ($countriesList as $value) {
                
            ?>
         <option value="<?php echo $value["COUNTRY_ID"]; ?>"><?php echo $value['NAME']; ?></option>  
       <?php
       }
        }
      ?>
     
    </select>
    </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Method Payment</label>   
            <select id="methodPayment" name="methodPayment" class="form-control">
            <option selected>Choose...</option>
            <?php 
        
                if(isset($paymentMethodsList) && is_array($paymentMethodsList) && count($paymentMethodsList) > 0){
                    foreach ($paymentMethodsList as $value) {
                        
                    ?>
                <option value="<?php echo $value["payment_id"]; ?>"><?php echo $value['name']; ?></option>  
            <?php
            }
                }
            ?>
            
            </select>
            <div id="creditCardForm">
        <form class="form-horizontal" role="form" style="display:none;">
                <fieldset>
                <legend>Payment</legend>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-number">Card Number</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
                    <div class="col-sm-9">
                    <div class="row">
                        <div class="col-xs-3">
                        <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                            <option>Month</option>
                            <option value="01">Jan (01)</option>
                            <option value="02">Feb (02)</option>
                            <option value="03">Mar (03)</option>
                            <option value="04">Apr (04)</option>
                            <option value="05">May (05)</option>
                            <option value="06">June (06)</option>
                            <option value="07">July (07)</option>
                            <option value="08">Aug (08)</option>
                            <option value="09">Sep (09)</option>
                            <option value="10">Oct (10)</option>
                            <option value="11">Nov (11)</option>
                            <option value="12">Dec (12)</option>
                        </select>
                        </div>
                        <div class="col-xs-3">
                        <select class="form-control" name="expiry-year">
                            <option value="13">2013</option>
                            <option value="14">2014</option>
                            <option value="15">2015</option>
                            <option value="16">2016</option>
                            <option value="17">2017</option>
                            <option value="18">2018</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                        </select>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="btn btn-warning">Pay Now</button>
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
        <button type="button" id="saveBtn" onClick="saveDonation()" class="btn btn-primary">Save</button> 

        </div>
        
        
        
    </div>
</form>

<script>

$(document).ready(function(){
  $("#creditCardForm").hide();
    $("#methodPayment").change(function(e){
        var methodPaymentSelected = $("#methodPayment option:selected" ).val();
      if(methodPaymentSelected  === '1'){
        $("#creditCardForm").show();
      }else{
        $("#creditCardForm").hide();
      }
      
    })
})
/**
  Guardar Datos de la Donacion
   */
  function saveDonation(){       
    var table = $('#donationsTable').DataTable();
      var methodPaymentSelected = $("#methodPayment option:selected" ).val();
      if(methodPaymentSelected  === '1'){

        $.ajax({
            url:"<?php echo base_url("Donations/saveDonation");?>",
            type:"POST",
            datatype:'json',
            data:$("form#donationForm").serialize(),            
            success:function(data){
                var obj = JSON.parse(data);     
               
              if(obj.response=='errors'){    
                    mensajeError("message",obj.message);
              }
              else{
              mensajeOk("message",obj.message);
              table.ajax.reload();//Updated data on datable
              $('#donationForm')[0].reset();
             }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              var mensa=catchError(jqXHR.status,errorThrown);
              mensajeError("message","Error:" + mensa);
                 
          } 
           
            
        });

      }else{
        mensajeError("message","Por el momento Solo Puede Seleccionar Tarjeta de  Credito para hacer el donativo");
      }
        
        
    }

</script>