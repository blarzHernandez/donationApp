<?php 
$this->load->view("template/header"); 
$this->load->view("template/nav_bar");
?>
<div class="container-fluid">
  <?php $this->load->view($dinamic);?>
</div>
<?php
$this->load->view("template/footer");
