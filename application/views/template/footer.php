<?php

  $fileName = 'visitors.txt';
  $filePath = dirname(__FILE__).'/'.$fileName;

  if (is_file($filePath)) {

    $fp = fopen($filePath, "c+");            
    $data = fread($fp, filesize($filePath)); 
    $arr = explode("\n", $data);             

    $c=0;
    foreach($arr as $visit) {
      $c++;
    }
    fwrite($fp,date('Y-m-d H:i:s')."\n");


    fclose($fp);

  } else {
   
    $fp = fopen($filePath, "w"); 
    $c=1;
    fwrite($fp, date('Y-m-d H:i:s')."\n");    
    fclose($fp);

  }

?>
<?php
include(APPPATH.'config/constants.php');
?>
<hr>
<button type="button" class="btn btn-primary btn-lg btn-block">Visitors: <?php echo $c;?></button>
<nav class="custom">
  <a class="nav-link active" href="#">Version App -><?php echo APP_VERSION;?></a>
  
</nav>
<style>
    .custom {
    background-color: #f5f5f5;
    bottom: -100px;
    height: 60px;
    position: 'fixed';
    width: 100%;
}
</style>
