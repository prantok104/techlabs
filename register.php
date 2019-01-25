<?php 
include('action/functions.php');
if(isset($_POST['register'])){
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phn'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    register($uname,$email,$phone,$pass,$cpass,'users');
}
include('header.php');
?>
<div class="container"> 
    <div class="register">
        <form action="" method="POST"> 
            <div class="  register-top-grid">
                <h3>PERSONAL INFORMATION</h3>
                    <label for="uname"> User Name *</label>
                    <input type="text" class="form-control" placeholder="Username*" name="uname" id="uname"> 

                    <span><label for="email">Email Address *</label></span>
                    <input type="text" class="form-control" placeholder="Email*" name="email" id="email"> 
                    
                    <span><label for="phn">Phone *</label></span>
                    <input type="text" class="form-control" placeholder="01xxxxxxxxx" name="phn" id="phn"> 
                    
                    <span><label for="pass">Password *</label></span>
                    <input type="password" class="form-control" placeholder="**********" name="pass" id="pass">
                    
                    <span><label for="cpass">Confirm Password *</label></span>
                    <input type="password" class="form-control" placeholder="**********" name="cpass" id="cpass">
            </div>
            <div class="register-but">
                <input type="submit" value="Register" name="register" class="acount-btn">
            </div>
            
            <?php 
                if($_GET['e'] == 0){

                } else if($_GET['e'] == 1){
                    echo '<p class="alert alert-danger text-capitalize"><i class="fa fa-check-circle"></i> :):) Something is Missing !</p>';
                }else if($_GET['e'] == 2){
                    echo '<p class="alert alert-danger text-capitalize"><i class="fa fa-check-circle"></i> :):) Username Already Exist !</p>';
                }else if($_GET['e'] == 3){
                    echo '<p class="alert alert-danger text-capitalize"><i class="fa fa-check-circle"></i> :):) Invalid Email Please Use Valid Email !</p>';
                }else if($_GET['e'] == 4){
                    echo '<p class="alert alert-danger text-capitalize"><i class="fa fa-check-circle"></i> :):) Email Already Exist !</p>';
                }else if($_GET['e'] == 5){
                    echo '<p class="alert alert-danger text-capitalize"><i class="fa fa-check-circle"></i> :):) Password Mismatch !</p>';
                }else if($_GET['e'] == 6){
                    echo '<p class="alert alert-danger text-capitalize"><i class="fa fa-check-circle"></i> :):) Password Upto Six charter.</p>';
                }
            ?>
            <div class=" login-left">
                <h3>NEW CUSTOMERS</h3>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                <a class="acount-btn" href="login.php?e=0">Have an Account?</a>
            </div>
        </form>
    </div>
    <?php include('sidebar.php');?>
    <?php include('footer.php');?>