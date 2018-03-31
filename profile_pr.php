<?php
@ob_start();
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <title>CC : Profile</title>

  <!-- mobile specific metas
================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" type="text/css" href="styles/bootstrap/css/bootstrap.min.css">
    <link href="styles/css/index.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="styles/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

        <style type="text/css">
			body{
				background-color: #f8f8ff;
			}
			input {
            width: 100%;
            border-color: 1px solid black !important;
        }

        .button {
            width: 100%;
        }

        h2{
            font-weight: 800;
            padding-top : 5px;
        }
        h3 {
            text-align: center;
            padding-top: 5%;
        }

        #logout {
            right: 0;
        }
        textarea {
            resize: none;
        }
        #blue-btn{
            background: none repeat scroll 0 0 #0cbbfc;
            border:1px solid #0cbbfc;
            border-radius:5px;
            color: white;
            font-weight: 400;
            padding: 0.8em 0.9em;
            display: block;
            margin:0.8em 0em;
        }
        #find_us{
            padding-left:40px;
        }
        .other_links{
            padding: 1px;
        }
        #others{
            padding-left: 20%;
        }
        small{
            color:white;
        }
        #form-div{
            background-color: #dee2e6;
            padding: 5%;
        }
        #form_area{
          background-color:#f5f5f5;
          padding: 5%;
        }
        #form_area
        select{
          width:100%;
          padding:5px;
        }
        textarea{
          width:100%;
        }
        img{
          justify-content: center;
        }
        #dp{
          justify-content: center;
          padding:10px;
        }
        #attr{
          width:50%;
          text-align: left;
          word-wrap: break-word;
          padding-left: 10px;
          padding-right : 10px;
        }
        #user_info{
          font-size: 15px;
          width:50%;
          text-align: left;
          word-wrap: break-word;
          padding-left: 10px;
          padding-right : 10px;
        }
        #info{
          padding:5px;
        }
			#verticalNav{
				font-size: 20px;
				font-weight: 200;
				text-align: justify;
				align-content: space-around;
				padding: 20px;
				border-spacing: inherit;
				border: 1px solid black;
			}
				#verticalNav a:hover{
						border-bottom: 1px solid black;

				}



    </style>

    <!-- CSS
================================================== -->
</head>
<body>

  <nav class="navbar navbar-expand-xl bg-light navbar-light">
      <a class="navbar-brand" href="index">Coders' Club</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="box-shadow: 0px 3px 5px">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="project_request">Project Request</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blogs">Blogs</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="find_resources">Resources</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about_us">About Us</a>
          </li>  
        </ul>
        <?php
            if(isset($_SESSION['rn']))
            {
                print("<ul class='navbar-nav'>
                            <li class='nav-item'>
                                <a class='nav-link' href='profile'>Profile</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='logout'>Logout</a>
                            </li>
                        </ul>");
            }
        ?>
      </div>  
    </nav>
    <div class="container-fluid">
    <div class="row">
 
    		<div class="col-3 mt-5">             
				 <nav class="navbar sticky-top">
    				  <ul class="navbar-nav" id="verticalNav">
						<li class="nav-item"><a href="profile.php" class="nav-link"><i class="icon-user"></i> Profile</a></li>
						<li class="nav-item"><a href="profile_pr.php" class="nav-link"><i class="icon-file"></i> Project Request</a></li>
						
						
						 <li class="dropdown">
                    <a href="blog_pr_save.php" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comments"></i> Blog <span class="pr-3"></span> <i class="icon-chevron-sign-down pl-3"></i></a>
                    <ul class="dropdown-menu">
						<li class="nav-item"><a  href="blog_pr_save.php"  class="dropdown-item nav-link  pl-3" ><i class="icon-bookmark"></i>  Bookmark</a></li> 	
						<li class="nav-item"><a href="blog_pr_like.php" class="dropdown-item nav-link pl-3"><i class="icon-thumbs-up-alt"></i>  Like</a></li>
						
                    </ul>
                  </li>
						
						<li class="nav-item"><a href="bugs.php" class="nav-link"><i class="icon-bug"></i> <i class="fa fa-wrench"></i> Bug Report</a></li>        
				      </ul>
    				</nav>
    		</div><!--col-3-->
    		
      <div class="col-9" id="form_area">

   		 	<?php
	
		
		include("db_conn.php");
		

		$roll_no = $_SESSION['rn'];
		$user_name = $_SESSION['uname'];	
		$user_email = $_SESSION['eid'];
	

		  $query = "SELECT * FROM project_requests where name = ' " .$user_name . " ' ";
		  $result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
				if($count == 0){
						echo('<div class="alert bg-warning text-center"><h2 >You have not submitted any project</h2></div>');
				}
		else{		
		while( $row = mysqli_fetch_assoc($result)){
			   $name = $row['name'];
			   $email = $row['email'];
			   $contact = $row['contact'];
			   $profession = $row['profession'];
			   $organization = $row['organization'];
			   $project_type = $row['project_type'];
			   $project_desc = $row['project_description']; 	  
			 
			 
		?>
 		
  		<div class="card  text-center ">
  			<div class="card-body">
  				<div class="title lead">Name: <?php echo $name;?></div>
  				<div class="sub-title lead mb-2">Profession: <?php echo $profession;?></div>
  				<p class=" lead">Organizaion: <?php echo $organization ;?></p>
  				<p class="lead">Project Type: <?php echo $project_type ;?></p>
  				<h4 class="lead "> <?php echo $project_desc ;?></h4>
  			</div>
  			<div class="card-footer">
  				<p class="text-muted lead">Email:  <?php echo $email ;?></p>
  				<p class="text-muted lead">Contact: +91 <?php echo $contact ;?></p>
  			</div>
  		</div>
  		<br>
  		
  		
  		
  		
  		<?php } }?>
  	
    		   

			</div><!--col--9-->
     
		</div> <!--row-->
  </div><!-- container-fluid-->
  
  

  <!--===========FOOTER======================-->
              <div id="footer">
                <div class="col-xl-12" id="other_links">
                    <div class="row">
                        <div class="col-6">
                            <h3 style="margin-bottom:3%">Other Links</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul id="others">
                                        <li class="other_links"><a href="support_us" style="text-decoration: none;color: white">Support Us</a></li>
                                        <li class="other_links"><a href="leaderboard" style="text-decoration: none;color: white">Leaderboard</a></li>
                                    </ul>
                                </div>
                                <div class='col-sm-6'>
                                    <ul id="others">
                                        <li class="other_links"><a href="report_bugs" style="text-decoration: none;color: white">Report a Bug</a></li>
                                        <li class="other_links"><a href="faqs" style="text-decoration: none;color: white">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-xl-12' id="social-networks">
                    <a href="https://twitter.com/FCRITcodersclub" style="text-decoration: none">
                        <div id="twitter" class="social-sprites"></div>
                    </a>
                    <a href="#" style="text-decoration: none">
                        <div id="facebook" class="social-sprites"></div>
                    </a>
                    <a href="https://plus.google.com/u/2/110531617173128497831" style="text-decoration: none">
                        <div id="google" class="social-sprites"></div>
                    </a>
                    <a href="#" style="text-decoration: none">
                        <div id="linkedin" class="social-sprites"></div>
                    </a>
                </div>
                <div class="col-xl-12" id="make">
                    <i><small>&lt;Made by Coders' Club&copy;,FCRIT/&gt;</small></i>
                </div>
            </div>
            
    <!--===========END OF FOOTER======================-->


        <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/uxl/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
        <script src="styles/bootstrap/js/bootstrap.min.js"></script>



</body>
</html>