
<?php
    if (isset($_GET['stat'])) {
        switch ($_GET['stat']) {
            case '1':
                $msg = '<div class="alert alert-danger">
            User Credential is required!
            </div>';
                break;
            case '2':
                $msg = '<div class="alert alert-info">
            You already sign out, Thank you.
            </div>';
                break;
        }
    }

    if (isset($_GET['msg'])) {
        $message = '<div class="alert alert-danger">' . $_GET['msg'] . '</div>';
    }
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    ?>
<!-- Template CSS -->
<link rel='shortcut icon' type='image/x-icon' href=<?= base_url('gambar/faviconsetia.ico') ?> />
<!-- General CSS Files -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
    <body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?php echo base_url(); ?>gambar/setialogo.png" alt="logo" width="200" height="200px" class="shadow-light rounded-circle">
                            <h6 style="padding-top: 10px">SISTEM ENTRI TIKET APS</h6>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header"><h4    >Login</h4></div>

                            <div class="card-body">
                                <form method="POST" action="<?php echo site_url('user/login'); ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="<?php echo base_url(); ?>dist/auth_forgot_password" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
<!--                                <div class="text-center mt-4 mb-3">-->
<!--                                    <div class="text-job text-muted">Login With Social</div>-->
<!--                                </div>-->
<!--                                <div class="row sm-gutters">-->
<!--                                    <div class="col-6">-->
<!--                                        <a class="btn btn-block btn-social btn-facebook">-->
<!--                                            <span class="fab fa-facebook"></span> Facebook-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                    <div class="col-6">-->
<!--                                        <a class="btn btn-block btn-social btn-twitter">-->
<!--                                            <span class="fab fa-twitter"></span> Twitter-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </div>-->

                            </div>
                        </div>
<!--                        <div class="mt-5 text-muted text-center">-->
<!--                            Don't have an account? <a href="--><?php //echo base_url(); ?><!--dist/auth_register">Create One</a>-->
<!--                        </div>-->
                        <div class="simple-footer">
                            Copyright &copy; GTG Medan & Duktek 2019
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('dist/_partials/js'); ?>
