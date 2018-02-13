<?php
/* Set e-mail recipient */
$myemail = "contact@oddbirdstudio.ca";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name");
$subject = check_input($_POST['subject'], "Enter a subject");
$email = check_input($_POST['email']);
$message = check_input($_POST['message'], "Write your message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("E-mail address not valid");
}
/* Let's prepare the message for the e-mail */
$message = "

Name: $name
E-mail: $email
Subject: $subject

Message:
$message

";

/* Send the message using mail() function */
mail($myemail, $subject, $message); //STMP 

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<head>
    <title>OddBird Studio</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/animations.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-76131609-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
<!-- A basic responsive reset -->
    <style>
        @-webkit-viewport { width: device-width; zoom: 1.0; }
           @-moz-viewport { width: device-width; zoom: 1.0; }
            @-ms-viewport { width: device-width; zoom: 1.0; }
             @-o-viewport { width: device-width; zoom: 1.0; }
                @viewport { width: device-width; zoom: 1.0; }
        html { overflow-y: auto; }
        img, audio, video, canvas { max-width: 100%; }
        /*  Sets body width */
        .container {
            max-width: 40em;
            width: 88%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head>
<body class="font-bundle-monstserrat xpos-center ypos-top">




    <!--[if lt IE 7]>
    <p class="browsehappy">
    You are using an <strong>outdated</strong> browser. Please
    <a href="http://browsehappy.com/">upgrade your browser</a> to improve
    your experience.
    </p>
    <![endif]-->
    
<header>
    <nav>
        <ul>
            <a href="index.html"><img id="logo" src="img/Logo.png" alt="test" style="width:160px;height:160px;"></a>
            <li>
                    <a href="index.html" class="text">Home</a>
            </li>
            <li>
                    <a href="about.html" class="text">About</a>
            </li>
            <li>
                    <a href="projects.html" class="text">Projects</a>
            </li>
            <li>
                    <a href="contact.php" class="text">Contact</a>
            </li>
        </ul>
    </nav>
</header>

    <div id="content-container">
 
  	<h5>Please correct the following error:</h5>
	<h2><strong><?php echo $myError; ?></strong></h2>
	<a href="javascript:history.go(-1)"><h1 id="back">Try Again</h1></a>
	</div>
    <a href="https://twitter.com/OddBirdStudio" target="_blank">><img id="social-media-twit" src="img/twitter.png" style="height:7%;" alt="twitter"> </a>
    <a href="https://facebook.com/oddbirdgamedesign" target="_blank">><img id="social-media-faceb" src="img/facebook.png" style="height:7%;" alt="facebook"/></a>
    

    <div id="filler">
    </div >
    	
   	
  <footer>
        &copy; OddBird Studio | 2016
  </footer>

</body>

</html>
<?php
exit();
}
?>