<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="mikhail mouner personal website">
    <meta name="keywords" content="mikhail mouner, web developer, egypt, egy, mm-eg.ml,web desginer ,personal resume, clean, modern">
    <meta name="author" content="mikhail mouner">
    <!--include css-->
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/jquery.selectBoxIt.css">
    <link rel="stylesheet"href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/favicon.ico">
    <title>Mikhail Mouner</title>
</head>
<body class="position-relative" data-spy="scroll" data-target="#myHeader" data-offset="50">
<?php
    include "connect.php";
    if ($_SERVER['REQUEST_METHOD']=='POST'){
	    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['msg'] && $_POST['name']!=null)){
            $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	        $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
	        $phone=(!empty($_POST['phone']))? filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT):0;
	        $msg=filter_var($_POST['msg'],FILTER_SANITIZE_STRING);
		    $stmt= $con->prepare('INSERT INTO messages (username, email, phone, msg) VALUES (:zusername, :zemail, :zphone, :zmsg)');
		    $stmt->execute(array('zusername' => $name, 'zemail' => $email, 'zphone' => $phone, 'zmsg' => $msg));
		    $stmt->rowCount();

		    ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong>Thanks <?php echo $name ?> ,for feedbacking
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
		    <?php
            $_POST['name']=null;
	    }
        else{
	        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Someting wrong was happened
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
	    }
    }
?>
<!--preloader starts-->
<div class="loader_bg"><div class="loader"></div></div>
<!--preloader ends-->
<!--start body-->
<!--Start chat-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c65d11f7f688621d571d311/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<div class="chat" style="display:none">
    <div class="chat-icon">
        <i class="fa fa-share-square fa-fw"></i>
        <p>feedback</p>
    </div>
    <form action="<?php $_SERVER['PHP_SELF']?>"  method="post">
        <div class="input-group mb-1 position-relative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
            </div>
            <input type="text" class="form-control name" placeholder="Enter your name" name="name" data-toggle="tooltip" data-placement="top" title="more than 3 letters">
            <i class="fa fa-asterisk fa-fw asterisk"></i>
        </div>
        <div class="input-group mb-1">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fa fa-envelope fa-fw"></i></span>
            </div>
            <input type="email" class="form-control email" placeholder="Enter your email" name="email"data-toggle="tooltip" data-placement="top" title="@example.com">
            <i class="fa fa-asterisk fa-fw asterisk"></i>
        </div>
        <div class="input-group mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone fa-fw"></i></span>
            </div>
            <input type="number" class="form-control"  placeholder="Enter your number" name="phone"data-toggle="tooltip" data-placement="top" title="+20**********">
        </div>
        <div class="input-group mb-1">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-comment-alt fa-fw"></i></span>
            </div>
            <textarea class="form-control message" aria-label="With textarea" placeholder="Your message" name="msg"data-toggle="tooltip" data-placement="top" title="more than 10 letters"></textarea>
            <div class="asterisk">
                <i class="fa fa-asterisk fa-fw"></i>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" disabled value="Send" id="sendMssg">
    </form>
</div>
<!--End chat-->
<!--start navbar-->
<div class="scrollup" style="display:none">
    <a id="backtotop" class="visible">
        <i class="fas fa-chevron-circle-up fa-3x"></i>
    </a>
</div>
<div class="header" id="home">
    <div class="overlay">
        <div class="container">
            <div class="logo col-3">
                <h1>mikhail</h1>
                <p>full web stack developer</p>
            </div>
            <nav>
                <ul class="nav col-9" id="myHeader">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home" data-value="home">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about" data-value="about">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service" data-value="service">services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#protfolio" data-value="protfolio">protfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" data-value="contact">contact</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="title">
            <h1>mikhail mouner</h1>
            <div id=flip>
                <div><div>Communication Engineer</div></div>
                <div><div>Web Developer</div></div>
                <div><div>Web Designer</div></div>
            </div>
        </div>
        <div class="down text-center">
            <a href="#about">
                <i class="fas fa-chevron-circle-down fa-3x rounded-circle"></i>
            </a>
        </div>
    </div>
</div>
<!--end navbar-->
<div class="container about" id="about">
    <div class="head-bourder"><h2>about me</h2></div>
    <div class="row">
        <div class="col-md-4 col-sm-6 about-info">
            <h1>Mikhail Mouner</h1>
            <p>full stack web developer</p>
            <p>Recent Communication Engineering graduate from Modern Academy for Engineering & Technology with freelancing work experience as Web developer as Full Stack Developer for one year.</p>
            <a href="Mikhail-Mouner-Mourad.pdf" class="btn" download="Mikhail" target="_blank">download c.v</a>
        </div>
        <div class="col-md-4 col-sm-6 about-img">
            <img src="images/me.jpg" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-4 col-sm-6 about-skill">
            <h1>my skills</h1>
            <div class="col-md-12">
                <div class="skillbar" data-percent="95%"> <!--edit percentage-->
                    <h6 class="skillbar-title">HTML / CSS</h6> <!--edit skills-->
                    <h6 class="skillbar-percent">95%</h6> <!--edit percentage-->
                    <div class="skillbar-bar">
                        <div class="skillbar-child wow zoomInLeft" style="width: 95%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="skillbar" data-percent="90%"> <!--edit percentage-->
                    <h6 class="skillbar-title">Sass</h6> <!--edit skills-->
                    <h6 class="skillbar-percent">90%</h6> <!--edit percentage-->
                    <div class="skillbar-bar">
                        <div class="skillbar-child wow zoomInLeft" style="width: 90%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="skillbar" data-percent="90%"> <!--edit percentage-->
                    <h6 class="skillbar-title">PHP</h6> <!--edit skills-->
                    <h6 class="skillbar-percent">90%</h6> <!--edit percentage-->
                    <div class="skillbar-bar">
                        <div class="skillbar-child wow zoomInLeft" style="width: 90%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="skillbar" data-percent="80%"> <!--edit percentage-->
                    <h6 class="skillbar-title">MySQL</h6> <!--edit skills-->
                    <h6 class="skillbar-percent">80%</h6> <!--edit percentage-->
                    <div class="skillbar-bar">
                        <div class="skillbar-child" style="width: 80%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="skillbar" data-percent="75%"> <!--edit percentage-->
                    <h6 class="skillbar-title">Wordpress</h6> <!--edit skills-->
                    <h6 class="skillbar-percent">75%</h6> <!--edit percentage-->
                    <div class="skillbar-bar">
                        <div class="skillbar-child wow zoomInLeft" style="width: 75%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="skillbar" data-percent="70%"> <!--edit percentage-->
                    <h6 class="skillbar-title">JS</h6> <!--edit skills-->
                    <h6 class="skillbar-percent">70%</h6> <!--edit percentage-->
                    <div class="skillbar-bar">
                        <div class="skillbar-child wow zoomInLeft" style="width: 70%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container service" id="service">
    <div class="head-bourder"><h2>service</h2></div>
    <div class="row">
        <div class="col-md-4 col-sm-6 service-item">
            <i class="fab fa-wordpress fa-fw fa-4x"></i>
            <h3>WordPress development</h3>
            <p>We offer WordPress design, a development, Backup, Support service which comprises theme install, plugin install, support and maintenance.</p>
        </div>
        <div class="col-md-4 col-sm-6 service-item">
            <i class="fa fa-paint-brush fa-fw fa-4x"></i>
            <h3>web design</h3>
            <p>We can help you have a website design that will not only look great, but meet the needs of both you and your customers to help you build your online presence and get noticed.</p>
        </div>
        <div class="col-md-4 col-sm-6 service-item">
            <i class="fab fa-php fa-fw fa-4x "></i>
            <h3>PHP development</h3>
            <p>We provide high quality and cost-effective Laravel development services. Power your web application with world's most advanced web framework.</p>
        </div>
    </div>
</div>
<div class="container portfolio" id="protfolio">
    <div class="head-bourder"><h2>My work</h2></div>
    <div class="row">
        <img src="images/ecommerce8.jpg" class="img-thumbnail img-fluid w-100 h-100 col-md-6 col-sm-12">
        <div class="portfolio-info col-md-6 col-sm-12">
            <h1>e-commerce shop</h1>
            <blockquote>it is under work</blockquote>
            <p>you can sign up</p>
            <p>login:</p>
            <div class="portfolio-info-login" style="display:none">
                <label>username:</label><kbd>Mikhail</kbd>
                <label>password:</label><kbd>123</kbd>
            </div>
            <a href="http://mm-eg.ml/" class="btn">link</a>
        </div>
    </div>
</div>
<div class="container contact" id="contact">
    <div class="head-bourder"><h2>contact</h2></div>
    <div class="row contact-info">
        <div class="col-md-4 w-100 contact-info-item">
            <i class="fa fa-home fa-2x fa-fw"></i>
            <h3>location</h3>
            <p>Cairo,Egypt</p>
        </div>
        <div class="col-md-4 w-100 contact-info-item">
            <i class="fa fa-phone fa-2x fa-fw"></i>
            <h3>phone</h3>
            <p>(+20)1206111051</p>
        </div>
        <div class="col-md-4 w-100 contact-info-item">
            <i class="fa fa-envelope fa-2x fa-fw"></i>
            <h3>email</h3>
            <p>mikhaeelmouner@yahoo.com</p>
        </div>
    </div>
</div>
<footer>
    Made with <span>♥</span> by <span>mikhail mouner</span>
</footer>
<!--end body-->
<!--include js-->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.selectBoxIt.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/main.js"></script>
</body>
</html>