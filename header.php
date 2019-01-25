<!--A Design by Genius ICT World 
Author: MD.Mohaiminul Islam (Azim)
Author URL: http://geniusictworld.com/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Tech Support & Solution </title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--theme-style-->	
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <link rel="stylesheet" href="css/etalage.css" type="text/css" media="all" />
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--//fonts-->
        <script src="js/jquery.min.js"></script>
        <!--script-->
    </head>
    <body> 
        <!--header-->
        <div class="header">
            <div class="top-header">
                <div class="container">
                    <div class="top-header-left">
                        <ul class="support">
                            <li><a href="#"><label> </label></a></li>
                            <li><a href="#">24x7 live<span class="live"> support</span></a></li>
                        </ul>
                        <ul class="support">
                            <li class="van"><a href="#"><label> </label></a></li>
                            <li><a href="#">Free shipping </a></li>
                        </ul>
                        <ul class="support">
                            <li class="van"><a href="#"><label> </label></a></li>
                            <li><a href="#">Email-  alamin767@gmail.com </a></li>
                        </ul>
                    </div>
                    <div class="top-header-right">
                        <ul class="main-menu">
                            <li><a href="index.php">home</a></li>
                            <li><a href="product.php?sid=&pname=">Product</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="">Brand</a>
                                <ul class="drop-menu">
                                    <?php
                                        getthelink('brand');
                                    ?>
                                </ul>
                            </li>
                            <li><a href="contact.php?e=0">Contact</a></li>
                        </ul>
                    </div>	
                </div>
            </div>
            <div class="bottom-header">
                <div class="container">
                    <div class="header-bottom-left">
                        <div class="logo">
                            <a href="index.php"><img src="images/logo%20-%20Copy.png" alt=" " /></a>
                        </div>
                        <div class="search">
                            <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" disabled>
                            <input type="submit"  value="SEARCH">

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="header-bottom-right">	
                        <?php
                        if(!isset($_SESSION['login'])){
                            echo '<div class="account"><a href="login.php?e=0"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                    SIGN IN</a>
                                    </div>
                        <div class="account"><a href="register.php?e=0"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            SIGN UP</a>
                        </div>';
                        }else{
                            echo '
                                <div class="account"><a href=""><i class="fa fa-user" aria-hidden="true"></i>
                                  Hi, '.$_SESSION['loguname'].'</a>
                                </div>
                                <div class="account"><a href="action/logout.php?d='.$_SESSION['logid'].'"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                    SIGN OUT</a>
                                </div>';
                        }?>
                    </div>
                </div>
            </div>
        </div>
        <!---->
