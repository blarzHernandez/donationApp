<h1>Please Fill out the Form</h1>
<form action="saveUser" method="post" id="formUser">
<div id="message"></div>

<div class="card">
<h5 class="card-header">User Data</h5>
<div class="card-body">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username/Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  
</div>
</div>


<div class="card">
  <h5 class="card-header">Personal Information</h5>
  <div class="card-body">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Names</label>
      <input type="text" class="form-control" id="names" name="names" placeholder="Names">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Surnames</label>
      <input type="text" class="form-control" id="surnames" name="surnames" placeholder="Surnames">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Type your address">
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputState">Country</label>   
    <select id="country" name="country" class="form-control">
      <option value="null" selected>Choose...</option>
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
    <div class="form-group col-md-6">
      <label for="inputState">Department</label>
      <select id="department" name="department" class="form-control">
        <option  value="null" selected>Choose...</option>
        <?php 
          if(isset($departmentsList) && is_array($departmentsList) && count($departmentsList) > 0){
              foreach ($departmentsList as $key => $value) {
                  
              ?>
           <option value="<?php echo $value["DEPARTMENT_ID"]; ?>"><?php echo $value['NAME']; ?></option>  
         <?php
         }
          }
        ?>
       
      </select>
    </div>
    <button type="button" id="saveBtn" onClick="saveUser()" class="btn btn-outline-primary">Save Data</button> || 
    <button type="button" id="signUpBtn" class="btn btn-outline-secondary" onClick="home()">Log In</button>
    
  </div>
</div>
</div>
</form>

<script>
$(document).ready(function(){
 

})

 /**
  Guardar Datos del Usuario
   */
  function saveUser(){       
    var country = $("#country option:selected" ).val();
    var department = $("#department option:selected" ).val();    
    if(country === 'null' || department === 'null'){
      mensajeError("message","Por Favor seleccione un pais o departamento valido");
    }else{
      $.ajax({
            url:"<?php echo base_url("userController/saveUser");?>",
            type:"POST",
            datatype:'json',
            data:$("form#formUser").serialize(),            
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
      
    }

    function home(){
      window.location.replace("http://localhost/donationApp");
    }
</script>