            <?php
session_start();
include './main.php';
include('./header.php') ;

?>
            <html>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href='http://fonts.googleapis.com/css?family=Lobster&subset=all' rel='stylesheet' type='text/css'>
                <link href="assets/css/bootstrap.min.css" rel="stylesheet">
                <link href="assets/css/style.css" rel="stylesheet">
            </head>
            <body class="back">

                <div class="col-md-3"></div>
                <div class="col-md-6 cont" >
                <div class="page-header" ><h1 style="font-size:28; text-align: center;"><B>Log in</B> </h1>
                </div>
                <form class="form-horizontal" action="" method="POST" >
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fn">username</label>
                        <div class="col-md-4">
                            <input id="username" name="username" type="text" placeholder="username" class="form-control input-md" required>
                            </div></div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">password</label>
                                <div class="col-md-4">
                                    <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    <button id="submit" name="submit" class="btn btn-info " style=" width:100%; margin-top: 20%; margin-bottom: 20%;font-size:24 ">login</button>
                                </div>
                                <div class="col-md-3"></div>
                           </body>
            <?php

if(count($_POST)>0){
	$username=$_POST['username'];
	$pw=$_POST['password'];


	if(isset($_POST['submit']))
		        {


		$user=new User;

		if($user->signIn($username,$pw))  {


			$target=new UserHandeller();
			$info=$target->selectBy("username", $username);
			if( $info['banned']==1){
				echo'  <div class="alert alert-info">
          <strong>Sorry!</strong> you are banned ! .
        </div>';

			}
			else {
				foreach ($info as $key => $value) {
					$_SESSION[$key]=$value;
          				}
					if($user->isAdmin($username))
									                            {

						header("location: admin/index.php ");
					}
					else {
            if(file_exists("lock")){
              echo'  <div class="alert alert-info">
                <strong>Sorry!</strong> The website is currently Offline ! .
              </div>' ;
            }else{
              header("location: index.php ");

            }




					}

			}
		}
		else{
			echo '
                         <div class="alert alert-info">
          <strong>Sorry!</strong> Invalid Logins .
        </div>';
		}
	}

}




?>
                </form>
            <script src="assets/js/jquery-3.1.1.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            </html>
