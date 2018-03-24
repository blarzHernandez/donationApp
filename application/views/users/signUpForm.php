<form action="signup">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Type your address">
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputState">Country</label>
    <select id="inputState" class="form-control">
      <option selected>Choose...</option>
      <?php 
        if(isset($countriesList) && is_array($countriesList) && count($countriesList) > 0){
            foreach ($countriesList as $key => $value) {
                
            ?>
         <option value="<?php echo $value["COUNTRY_ID"]; ?>"><?php echo $value['NAME']; ?></option>  
       <?php
       }
        }
      ?>
     
    </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Country</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <?php 
          if(isset($countriesList) && is_array($countriesList) && count($countriesList) > 0){
              foreach ($countriesList as $key => $value) {
                  
              ?>
           <option value="<?php echo $value["COUNTRY_ID"]; ?>"><?php echo $value['NAME']; ?></option>  
         <?php
         }
          }
        ?>
       
      </select>
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Save</button> or 
  <a id="signUpBtn" href='<?php echo base_url(); ?>' class="btn btn-outline-primary">Log In</a>
</form>