<h1 class"align-center">Donations</h1>
<h6>New Donation</h6>
<hr>
<form action="" method="post" id="donationForm">
  <div id="message"></div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Recipient</label>   
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
        </div>
        
        <button type="button" id="saveBtn" onClick="saveDonation()" class="btn btn-primary">Save</button> 

    </div>
</form>

<script>
/**
  Guardar Datos de la Donacion
   */
  function saveDonation(){       
               
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
              $('#formUser')[0].reset();
             }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              var mensa=catchError(jqXHR.status,errorThrown);
              mensajeError("message","Error:" + mensa);
                 
          }
          
           
            
        });
        
    }

</script>