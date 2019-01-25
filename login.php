<?php 
include('action/functions.php');
if(isset($_POST['log-btn'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    loginUser($email,$pass,'users');
}
include('header.php');
?>
<div class="container">
    <div class="account_grid">
        <div class=" login-right">
            <h3>REGISTERED CUSTOMERS</h3>
            <p>If you have an account with us, please log in.</p>
            <form action="" method="POST">
                <div>
                    <span><label for="email">Email Address *</label></span>
                    <input type="email" class="form-control" placeholder="Email*" name="email" id="email">
                </div> 
                
                <div>
                    <span><label for="pass">Password *</label></span>
                    <input type="password" class="form-control" placeholder="**********" name="pass" id="pass">
                </div>
                
                <a class="forgot" href="#">Forgot Your Password?</a>
                <input type="submit" value="Login" name="log-btn">
            </form>
            <?php 
                if($_GET['e'] == 0){

                } else if($_GET['e'] == 1){
                    echo '<p class="alert alert-danger text-center">:):) Something is Missing !</p>';
                }else if($_GET['e'] == 2){
                    echo '<p class="alert alert-danger text-center">:):) Invalid Email Please Use Valid Email !</p>';
                }else if($_GET['e'] == 3){
                    echo '<p class="alert alert-danger text-center">:):) Email Or Password MissMatch!</p>';
                }
            ?>
        </div>	
        <div class=" login-left">
            <h3>NEW CUSTOMERS</h3>
            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
            <a class="acount-btn" href="register.php?e=0">Create an Account</a>
        </div>
        <div class="clearfix"> </div>
    </div>
    <?php include('sidebar.php');?>
    <?php include('footer.php');?>