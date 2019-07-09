<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo PROJECT;?>-Home </title>
  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>application/asserts/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>application/asserts/css/main.css" rel="stylesheet">
  <link href="<?php echo base_url();?>application/asserts/css/media.css" rel="stylesheet">
  <link href="<?php echo base_url();?>application/asserts/css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>application/asserts/css/waitMe.css" rel="stylesheet" type="text/css">
  
  
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
<body>
  <div id="wrapper">
    <div class="navbar-fixed-top">
      <div class="">
        <nav class="navbar navbar-static-top head1">
          <div class="container-fluid">
            <div class="navbar-header"> <a href="#" class="navbar-brand logo-q"><?php echo LOGO;?></a>
              <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"> <a href="<?php echo base_url().'logout';?>">
                  <!-- <img class="img-circle img-user" src="<?php echo base_url().PROFILE_PIC_PATH.( isset( $this->session->logged_in['profile_pic'] ) ? $this->session->logged_in['profile_pic'] : DEFAULT_PROFILE_PIC ); ?>" onerror="this.onerror=null;this.src='<?php echo base_url().PROFILE_PIC_PATH.DEFAULT_PROFILE_PIC; ?>';"> -->
                  Logout
                  <?php
                    // echo ucfirst($this->session->userdata['logged_in']['user']);
                  ?>
                  </a>
                  <!-- <span class="caret"></span>

                  <ul>
                    <li><a href="">Logout</a></li>
                  </ul> -->
                  <!-- </ul> -->
              </ul>
            </div>
          </div>
        </nav>
      </div>
       <div class="container header-fixed-color margin-bottom-10 ">
        <div class="notes-top"> <i class="fa fa-home"></i> <span class="notes-txt">Dashboard</span>
      </div>
    </div>
    </div>
    <div class="container">
      <div class="col-md-12">
          <?php
           $query_box = '';
             // print_array($query,1);
            if( is_array( $query ) && !empty( $query ) && count( $query ) != 0 )
            {
              foreach ($query as $query_key => $query_val) 
              {
                $query_box .= '<div class="row">';
                $query_box .= '<div class="col-md-5 pad-rgt0">';
                if( $query_key == 0 )
                {
                  $query_box .= '<p class="q-head">Query Name</p>';
                }
                $query_box .= '<div class="card-box" id="qquery_'.$query_val['id'].'">'.$query_val['query'].'</div>';
                $query_box .= '</div>';
                $query_box .= '<div class="col-md-3 pad-rgt2 pad-lft2">';
                if( $query_key == 0 )
                {
                  $query_box .= '<p class="q-head">Query Status</p>';
                }
                $query_box .= '<div class="card-box qstatus" id="qstatus_'.$query_val['id'].'"><span class="dot"></span><p class="fnt-sze mgn0">Last Updated:</p><span class="timeago fnt-sze">Not yet running</span></div>';
                $query_box .= '</div>';
                $query_box .= '<div class="col-md-4 pad-rgt0 pad-lft0">';
                if( $query_key == 0 )
                {
                  $query_box .= '<p class="q-head">Query Result</p>';
                }
                $query_box .= '<div class="card-box qresult" id="qresult_'.$query_val['id'].'">Not yet running</div>';
                $query_box .= '</div>';
                $query_box .= '</div>';
              }
            }
            else
            {
              $query_box .= '<div class="col-md-12"><center><strong>No Data Found</strong></center></div>';
            }
            echo $query_box;
          ?>
      </div>
    </div>
     
    <footer class="footer1">
      <p>© <?php echo date('Y');?> <span class="pull-right"></span></p>
    </footer>
  </div>
  <!-- jQuery -->
  <script src="<?php echo base_url();?>application/asserts/js/jquery.js"></script>
  <script src="<?php echo base_url();?>application/asserts/js/jquery-ui.js"></script> 
  <script src="<?php echo base_url();?>application/asserts/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>application/asserts/js/home.js"></script>
<script type="text/javascript">
  var base_url = "<?php echo base_url();?>";
  var query = '<?php echo json_encode( $query );?>';
</script>
</body>
</html>