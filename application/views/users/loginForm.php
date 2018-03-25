<h1 class"align-center">Welcome to the Donation App</h1>
<form action="" method="post" id="loginForm">
  <div id="message"></div>
    <div class="form-group">
    <label for="username">Username/email </label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email">
    </div>
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <button type="button" onClick="login()" class="btn btn-primary">Sig in</button>
    <a id="signUpBtn" href='usercontroller/renderView' class="btn btn-outline-primary">Register</a>
</form>
<script>
$(document).ready(function(){
 

})
 /**
  Guardar Datos del Usuario
   */
  function login(){       
               
        $.ajax({
            url:"<?php echo base_url("userController/login");?>",
            type:"POST",
            datatype:'json',
            data:$("form#loginForm").serialize(),            
            success:function(data){
                var obj = JSON.parse(data);     
              
              if(obj.response === 'errors'){    
                    mensajeError("message",obj.message);
              }
              else{
                window.location.replace("home");
             }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              var mensa=catchError(jqXHR.status,errorThrown);
              mensajeError("message","Error:" + mensa);
                 
          }
          
           
            
        });
        
    }

</script>

