<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Bienvenido: <?php echo $this->session->userdata("user")?></li>
  </ol>
</nav>
<?php
$this->load->view("donationForm");
echo '<br>';
 $this->load->view("mydonations");
?>