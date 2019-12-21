<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php

if ($this->ion_auth->user()->row() == null) {
    redirect(site_url('user/login'));
    exit();
}

?>
    <style>
        .btn-social{
            color: black !important;
        }
    </style>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="#">DUKTEK</a><br>
            <a href="https://www.instagram.com/ganglabey/" target="_blank" class="">
                <span class="fab fa-instagram"></span> Ganglabey
            </a>as Developer
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

<?php $this->load->view('dist/_partials/js'); ?>