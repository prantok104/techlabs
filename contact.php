<?php 
session_start();
include('action/dbcon.php');
include('action/functions.php');
if(isset($_POST['con-btn'])){
    $name = $_POST['uname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    
    contact($name,$email,$msg);
}



include('header.php');
?>
<div class="container">	
    <!---->
    <div class="main"> 
        <div class="reservation_top">          
            <div class=" contact_right">
                <h3>Contact Form  
                   <?php
                        if($_GET['e'] == 0){

                        } else if($_GET['e'] == 1){
                            echo '<b class="alert alert-danger text-capitalize"><i class="fa fa-check-circle"></i> :):) Something is Missing !</b>';
                        }else if($_GET['e'] == 2){
                            echo '<b class="alert alert-danger text-capitalize"><i class="fa fa-check-circle"></i>Please Use Valid Email</b>';
                        }else if($_GET['e'] == 3){
                            echo '<b class="alert alert-success text-capitalize"><i class="fa fa-check-circle"></i> :):)Send The Message</b>';
                        }
                    ?>
                </h3>
                
                <div class="contact-form">
                    <form method="POST" action="">
                        
                        <label for="uname">Your Name*</label>
                        <input type="text" class="textbox" placeholder="Name" id="uname" name="uname">

                        <label for="email">Email*</label>
                        <input type="text" class="textbox" placeholder="Email" id="email" name="email">

                        <textarea  placeholder="Message" name="msg"></textarea>
                        
                        <input type="submit" value="contact" name="con-btn">
                        
                        
                    </form>
                    
                    <address class="address">
                        <p>Tech Support  & Solution, <br>Shop -74, 5th Floor, Shah Ali Plaza, </p>
                        <p>Mirpur-10, Dhaka-1216.</p>
                        <dl>
                            <dt> </dt>
                            <dd>Telephone:<span> 01708178291 </span></dd>
                            <dd>Telephone:<span> 01708178292 </span></dd>
                            <dd>Telephone:<span> 01708178293 </span></dd>
                            <dd>Telephone:<span> 01708178294 </span></dd>
                            <dd>E-mail:&nbsp; <a href="mailto:alamin767@gmail.com">alamin767@gmail.com</a></dd>
                        </dl>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <?php include('sidebar.php');?>
    <?php include('footer.php');?>