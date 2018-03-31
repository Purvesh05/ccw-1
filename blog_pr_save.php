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
		  
		
				
	

				$sql1 = "Select * from blogs b,blog_saves bs where b.blog_id = bs.blog_id and user_id =$roll_no order by blog_timestamp desc";
				$result1 = mysqli_query($conn,$sql1);
					while($data = mysqli_fetch_array($result1))
					{	
						$blog_id=$data['blog_id'];
						$title = $data['blog_title'];
						$roll_no = $data['roll_no'];
						$author = $data['blog_author'];
						$category = $data['blog_category'];
						$date = $data['blog_timestamp'];
						$content = $data['blog_content'];

						//Get all who have liked this blog
						$query2="select roll_no,first_name,last_name from profiles where roll_no in (select user_id from blog_likes where blog_id=$blog_id);";
						$result2=mysqli_query($conn,$query2);

						//check if user has liked the blog
						if(isset($_SESSION['rn'])){
							$query3="select blog_id from blog_likes where blog_id=$blog_id and user_id=$blog_id;";
							$result3=mysqli_query($conn,$query3);
							if(mysqli_num_rows($result3)>0)
							{
								$liked=1;
							}
							else
							{
								$liked=0;
							}							
						}
						else{
							$liked=0;													
						}

						$query4="select count(*) from blog_likes where blog_id=$blog_id;";
						$likes=mysqli_fetch_array(mysqli_query($conn,$query4));

						//check if user has saved the blog
						if(isset($_SESSION['rn'])){
							$query5="select blog_id from blog_saves where blog_id=$blog_id and user_id=$blog_id;";
							$result5=mysqli_query($conn,$query5);
							if(mysqli_num_rows($result5)>0)
							{
								$saved=1;
							}
							else
							{
								$saved=0;
							}							
						}
						else{
							$saved=0;													
						}

					
					?>	

					<div class="card mb-5" id="<?php echo $blog_id ?>">
						<div class="card-body">
							<h4 style="margin:0" class="card-title font-weight-bold"><?php echo $title ?></h4>
							<p style="margin:0"><a href="#"><em>by:<?php echo $author ?></em></a></p>
							<p><span class="badge badge-pill badge-secondary"><a href="blogs.php?category=<?php echo $category ?>"><?php echo $category ?></a></span><p>
							<p class="card-text blog_content"><?php echo $content ?></p>
						</div>
						<div class="card-footer noselect">
							<?php
							if($liked==1)
							{
								echo '<i id="unlike_'.$blog_id.'" class="like icon-heart icon-large"></i>&nbsp;';  
							}
							else
							{
								echo '<i id="like_'.$blog_id.'" class="like icon-heart-empty icon-large"></i>&nbsp;';  
							}
							?>
							
							<?php
							if($saved==1)
							{
								echo '<i id="remove_'.$blog_id.'" class="save icon-bookmark icon-large"></i>&nbsp;';  
							}
							else
							{
								echo '<i id="save_'.$blog_id.'" class="save icon-bookmark-empty icon-large"></i>&nbsp;';  
							}
							?>

							<i class="share icon-share-alt icon-large"></i>&nbsp;										
							<div class="dropdown" style="display:inline;float:right">
								<button style="padding:0px" class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-flag"></i>
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#">Report</a>
								</div>
							</div>
							<p id="likes_<?php echo $blog_id ?>" class="likes_link small font-weight-bold" data-toggle="modal" data-target="#likesModal_<?php echo $blog_id; ?>">
								<?php echo $likes[0] ?> likes
							</p>
							<p class="card-text"><small class="text-muted"><?php echo $date ?></small></p>
						</div>
					</div>
					<!-- Likes Modal -->
					<div id="likesModal_<?php echo $blog_id; ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Liked By:</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<?php
										if(mysqli_num_rows($result2)>0)
										{
											while($data2 = mysqli_fetch_array($result2))
											{
												$liked_by = $data2['first_name']." ".$data2['last_name']." (".$data2['roll_no'].")";
												echo "<p>".$liked_by."</p>";
											}
										}
										else{
											echo "No likes";
										}
									?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>

						</div>
					</div>
					<?php } ?>
    		       		   
    		   

			
			</div><!--col-9-->
     
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