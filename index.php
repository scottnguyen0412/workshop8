<?php
    include("config.php");
    session_start();
	$error = "";
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
    $pg_conn = pg_connect($conn_string);
    $sql ="SELECT* FROM account WHERE username = '$user' and password ='password'";
    $result = pg_query($pg_conn,$sql);
    $num_rows = pg_num_rows($result);

    if($num_rows == 1);
    {
        $row = pg_fetch_array($result, 0);
        $shop =$row['shopname'];
        if($shop == "Atnshop")
        {
            header('locaiton:atnshop.php');
	}
        
    }
    pg_close();
}
?>

<html> 

   <head>
	
      <title>ATN Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
		 h1 
		{
		  color: #666;
		  margin: 20px 10px 0px;
		  padding: 0px 30px 0px 30px;
		  text-align: center;
		}
      </style>
      
   </head>
   <h1> Welcome to ATN <h1/>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
                <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = "Submit"/><br />
				</form>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
