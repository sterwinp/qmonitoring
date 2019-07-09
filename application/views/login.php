<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php echo PROJECT;?>-Login</title>
  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>application/asserts/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>application/asserts/css/main.css" rel="stylesheet">
  <link href="<?php echo base_url();?>application/asserts/css/media.css" rel="stylesheet">
  <link href="<?php echo base_url();?>application/asserts/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo base_url();?>application/asserts/css/waitMe.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body class="bg-grey">
      <div class="wrapper margintop-m150px">
        <nav class="navbar">
          <div class="container">
            <div class="navbar-header">
        <!--        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      -->
      <a href="#" class="navbar-brand logo-q-login">QMONITORING</a> </div>
      <!--/.navbar-collapse -->
    </div>
  </nav>
  <div class="content">
    <div class="container">
      <div class="card-container">
        <div class="user-pic center-block">
          <?php
          $reme_cook = $this->input->cookie('rim_reme_cooks', TRUE);
              // echo $reme_cook;exit();
          if( isset ($reme_cook) )
          {
            parse_str($reme_cook); 
          }
          $display_none = '';
          $display      = 'display:none;';
          $user_name    = '';
          $pro_picture  = '';
          if( !empty( $usr ) && isset( $usr ) && empty( $email ) )
          {
            $display_none = 'display:none;';
            $display      = '';
            $user_name    = $usr;
            $pro_picture  = $picture;
          }
          $default_pic  = "this.src='".base_url().PROFILE_PIC_PATH.DEFAULT_PROFILE_PIC."'";
          echo '<img id="profile_login" src="'.( !empty($pro_picture) ? $pro_picture : base_url().PROFILE_PIC_PATH.DEFAULT_PROFILE_PIC ).'" onerror="'.$default_pic.'">';
          ?>
        </div>
        <div class="card">
          <!-- <form class="form-signin"> -->
          <?php echo form_open(base_url()."verifylogin",array("class"=>"form-signin"));?>
          <div class='login-form'>
            <div>
              <div class="login-big-txt">Sign In</div>
            </div>
            <?php 
            $errors = validation_errors('<strong><i class="fa fa-lightbulb-o"></i></strong>');
            if(!empty($errors))
            {
              ?>     
              <div role="alert" class="alert alert-danger alert-dismissible fade in">
                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                <?php
                print_r($errors);
                ?>
              </div>
              <?php 
            }
            ?>
            <div class="input-group mar-bottom20 no-dispaly-name" style="<?php echo $display_none; ?>"> <span class="input-group-addon sgn-input" id="basic-addon1"><img src="<?php echo base_url();?>application/asserts/images/username.png"/></span>
              <input type="text" name='email' required  class="form-control sgn-in email" id='email' placeholder="UserName" aria-describedby='basic-addon1'  value="<?php echo !empty($email) ? $email : ( !empty($user_name) ? $user_name : '' );?>"  autofocus>
            </div>
            <div class="dispaly-name" style="<?php echo $display; ?>"> <?php echo $usr; ?> </div>
            <div class="input-group  mar-bottom20"><span class="input-group-addon sgn-input" id="basic-addon1"> <img src="<?php echo base_url();?>application/asserts/images/password.png"/></span>
              <input type="password" name='pwd' required class="form-control pwd sgn-in" id='pwd' placeholder="Password" aria-describedby="basic-addon1" value="<?php echo isset($hash) ? $hash : '';?>" autofocus>
            </div>
          </div>
          <div class="forgot-password">
           <!--  <span class="remember-div" style="<?php echo $display_none; ?>">
              <div class="squaredThree">
                <input type="checkbox"  <?php echo isset($reme_cook) ? 'checked=checked' : '';?> name="remember" id="remember"  value=""><label for="remember"></label>
              </div>
              <label class="remember">Remember Me</label>
            </span>
            <a class='another-user pull-left' style="<?php echo $display; ?>"><i class='fa fa-arrow-left'></i> Another User</a> -->
            <!-- <a class="pull-right" data-toggle="modal" data-target="#forgot" href="#"> Forgot Password <i class='fa fa-arrow-right'></i> </a>  -->
          </div>
          <input type="submit" class="btn center-block btn-login login-button" value="Login">
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Forgot password -->
  <div class="modal fade" id="forgot" role="dialog"  data-backdrop="static" style="display:none;">
    <div class="modal-dialog modal-md">
      <div class="modal-content wait_content" style="top: 50px;">
        <div class="modal-header logoutHeader">
          <button type="button" class="close modalClose" data-dismiss="modal">&times;</button>
          <h4 class="modal-title logoutTitle">Forgot Password</h4>
        </div>
        <div class="modal-body wait_body">
          <div class="alert alert-dismissible fade in alert-danger error_msg" role="alert"  hidden>
            <button type="button" class="close close_alert" id='failed' aria-label="Close"><span aria-hidden="true">×</span></button>
            <span class="error_message"></span> 
          </div>
          <div class="alert alert-dismissible fade in alert-success update_success" role="alert"  hidden>
            <button type="button" class="close close_alert" id='success' aria-label="Close"><span aria-hidden="true">×</span></button>
            <span class="success_message"><i class="fa fa-lightbulb-o"></i>Successfully updated!</span>
          </div>
          <form onsubmit="event.preventDefault()" id="acount_form" class="acount_form">
            <div class="form-group">
              <label> Email</label>
              <input type="text" class="form-control" name="for_email" id="for_email" placeholder="Email" value="">
            </div>
          <!-- <div class="form-group">
            <label>New Password</label>
            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" value="">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="">
            </div> -->
          </div>
          <div class="modal-footer">
            <button type="submit" name="manage_submit" class="btn btn-success pwd_save"><i class="fa fa-check"></i> Reset</button>
            <button type="button" class="btn btn-danger modalClose" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <footer class="footer1">
    <p>© 2016 Ninestars Information Technologies Ltd <span class="pull-right">Powered by Ninestars</span></p>
  </footer>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url();?>application/asserts/js/bootstrap-jquery.js"></script>
<script src="<?php echo base_url();?>application/asserts/js/jquery-ui.js"></script> 
<script src="<?php echo base_url();?>application/asserts/js/waitMe.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url();?>application/asserts/js/bootstrap.min.js"></script>
<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>
</body>
</html>