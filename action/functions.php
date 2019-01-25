<?php
function gettablerow($condition, $value,$table,$output){
    include('dbcon.php');
    $sql = "SELECT * FROM $table WHERE $condition='".$value."'";
    $result = $db->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row[$output];
} 
function gettablecount($condition, $value,$table){
    include('dbcon.php');
    $sql = "SELECT * FROM $table WHERE $condition='".$value."'";
    $result = $db->query($sql);
    $count = $result->num_rows;
    return $count;
}

function logcheck($condition1, $value1, $condition2, $value2, $table){
    include('dbcon.php');
    $value2 = md5($value2);
    $sql = "SELECT * FROM $table WHERE $condition1='".$value1."' AND $condition2='".$value2."'";
    $result = $db->query($sql);
    $count = $result->num_rows;
    return $count;
} 

function useractive($useremail,$userpass,$table){
    include('dbcon.php');
    $pass = md5($userpass);
    $updatStatus = "UPDATE $table SET status='1' WHERE email = '".$useremail."' AND password = '".$pass."'";
    $result = $db->query($updatStatus);
}
function userdeactive($useremail,$userpass,$table){
    include('dbcon.php');
    $this->pass = md5($userpass);
    $updatStatus = "UPDATE $table SET status='1' WHERE email = '".$useremail."' AND password = '".$pass."'";
    $result = $db->query($updatStatus);
}

function getthelink($table){
    include('dbcon.php');
    $sql = "SELECT * FROM $table";
    $result = $db->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo '<li><a href="product.php?sid=10&pname='.$row['name'].'">'.$row['name'].'</a></li>';
    }
    
}
//SignUP function

function register($uname,$email,$phone,$pass,$repass,$tablename){
    include('dbcon.php');
    $getuname = gettablecount('uname',$uname,'users');
    $getemail = gettablecount('email',$email,'users');

    if(empty($uname) || empty($email) || empty($pass) || empty($repass)){
        $location = 'location:register.php?e=1';
        header($location);
    }else{
        if($getuname>=1){
            $location = 'location:register.php?e=2';
            header($location);
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $location = 'location:register.php?e=3';
                header($location);
            }else{
                if($getemail>=1){
                    $location = 'location:register.php?e=4';
                    header($location);
                }else{
                    if($pass != $repass){
                        $location = 'location:register.php?e=5';
                        header($location);
                    }else{
                        if(strlen($pass) <=6){
                            $location = 'location:register.php?e=6';
                            header($location);
                        } else{

                            $query = "INSERT INTO $tablename (`uname`, `email`, `phone`, `password`) VALUES ('".$uname."','".$email."','".$phone."','".md5($pass)."')";

                            $result = $db->query($query);
                            if($result){
                                $to = $email;
                                $from  = 'admin@gmail.com';
                                $subject = 'Congratulation';
                                $txt = 'Dear'.$uname.', <br> You are most welcome in our rsforex.com';
                                $headers = "From: ".$from. "\r\n"."CC: pranto506@gmail.com";

                                $name = mail($to,$subject,$txt,$headers);
                                $location = 'location:login.php?e=0';
                                header($location);
                            }
                        }

                    }

                }
            }
        }
    }
}

// Login function 

function loginUser($email,$pass,$table){
    include('dbcon.php');
    $check = logcheck('email',$email,'password',$pass,'users');

    if(empty($email) || empty($pass)){
        $location = 'location:login.php?e=1';
        header($location);
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo $check;
            $location = 'location:login.php?e=2';
            header($location);
        }else{

            if($check == '1'){
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['logid'] = gettablerow('email',$email,'users','id');
                $_SESSION['logemail'] = gettablerow('email',$email,'users','email');
                $_SESSION['loguname'] = gettablerow('email',$email,'users','uname');

                useractive($email,$pass,$table);
                $location = 'location:index.php? d='.$_SESSION['logid'].'';
                header($location);
            } else{
                $location = 'location:login.php?e=3';
                header($location); 
            }
        }
    }
}

// Create a Contact function
function contact($name,$email,$msg){
    include('dbcon.php');
    if(empty($name) || empty($email) || empty($msg)){
        $location = 'location:contact.php?e=1';
        header($location);
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $location = 'location:contact.php?e=2';
            header($location);
        }else{
            $sql = "INSERT INTO `contact`(`uname`, `uemail`, `umsg`) VALUES ('".$name."','".$email."','".$msg."')";
            $result = $db->query($sql);
            if($result){
                $location = 'location:contact.php?e=3';
                header($location);
            }
        }
    }
}


// lAST TWO PRODUCT SHOW
function lastProduct(){
    include('dbcon.php');
    $sql = "SELECT * FROM `products` ORDER BY id DESC LIMIT 2";
    $result = $db->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo '
            <a href="single.php?pid='.$row['id'].'&b=">				 
                <div class="col-md-6 con-sed-grid">
                    <div class=" elit-grid"> 
                        <h4>'.$row['title'].'</h4>
                        <label>FOR ALL PURCHASE VALUE</label>
                        <p>'.substr($row['content'],0,20).'</p>
                        <span class="on-get">GET NOW</span>						
                    </div>						
                    <img class="img-responsive shoe-left" src="techroot/action/functions.php?imid='.$row['id'].'" alt=" " />

                    <div class="clearfix"> </div>
                </div>
            </a>
        ';
    }
}

// Sidebar product

function sideProduct(){
    include('dbcon.php');
    
    $maxid = "SELECT MAX(id) as id FROM products";
    $result = $db->query($maxid);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $maxid = $row['id'];
    
    $id = rand(1,$maxid);
    
    $sql = "SELECT * FROM `products` WHERE id='".$id."'";
    $result = $db->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo '
            <a href="single.php?pid='.$row['id'].'&b=">
                <img class="img-responsive chain" src="techroot/action/functions.php?imid='.$row['id'].'" alt=" " />   		     		
                <div class="grid-chain-bottom chain-watch">
                    <span class="actual dolor-left-grid">'.$row['minprice'].'</span>
                    <span class="reducedfrom">'.$row['maxprice'].'</span>  
                    <h6><a href="single.php?pid='.$row['id'].'&b=">'.$row['title'].'</a></h6>  		     			   		     										
                </div>
            </a>
        ';
    }
}

// Index page product function

function indexProduct(){
    include('dbcon.php');
    $maxid = "SELECT MAX(id) as id FROM products";
    $result = $db->query($maxid);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $maxid = $row['id'];
    
    for($i= 1; $i<=12; $i++){
        $id = rand(1,$maxid);
        $sql = "SELECT * FROM `products` WHERE id='".$id."'";
        $result = $db->query($sql);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo '
                <div class="col-md-4 chain-grid">
                    <a href="single.php?pid='.$row['id'].'&b=">
                    <img class="img-responsive chain" src="techroot/action/functions.php?imid='.$row['id'].'" alt=" " /></a>
                    <span class="star"> </span>
                    <div class="grid-chain-bottom">
                        <h6><a href="single.php?pid='.$row['id'].'&b=">'.$row['title'].'</a></h6>
                        <div class="star-price">
                            <div class="dolor-grid"> 
                                <span class="actual">'.$row['minprice'].'Tk.</span>
                                <span class="reducedfrom">'.$row['maxprice'].'Tk</span>
                            </div>
                            <a class="now-get get-cart" href="contact.php?e=0">ADD TO CART</a> 
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }
    
    
}


// Get product by the pname=Apple , ASUS, Ases etc
function productBYName($pname){
    include('dbcon.php');
    $sql = "SELECT * FROM products WHERE quality = '".$pname."'";
    $result = $db->query($sql);
    $row = $result->num_rows;
    if($row<1){
        echo 'Have No Product';
    }else{
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo '
                <div class="  product-grid">
                    <div class="content_box">
                        <a href="single.php?pid='.$row['id'].'&b=">
                            <div class="left-grid-view grid-view-left">
                                <img src="techroot/action/functions.php?imid='.$row['id'].'" class="img-responsive watch-right" alt=""/>
                                <div class="mask">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                        </a>
                        <h4>'.$row['title'].'</h4>
                        <p>'.substr($row['content'],0,25).'<p>
                        '.$row['minprice'].' TK.
                        <a href="single.php?pid='.$row['id'].'&b=">read more</a>
                    </div>
                </div>
            ';
        }
    }
   
}

function productBYStatusAndName($status, $pname){
    include('dbcon.php');
    if($status == 10){
        productBYName($pname);
    }else{
        $sql = "SELECT * FROM products WHERE status = '".$status."' AND quality = '".$pname."'";
        $result = $db->query($sql);
        $row = $result->num_rows;
        if($row<1){
            echo 'Have No Product';
        }else{
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                echo '
                <div class="  product-grid">
                    <div class="content_box">
                        <a href="single.php?pid='.$row['id'].'&b=">
                            <div class="left-grid-view grid-view-left">
                                <img src="techroot/action/functions.php?imid='.$row['id'].'" class="img-responsive watch-right" alt=""/>
                                <div class="mask">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                        </a>
                        <h4>'.$row['title'].'</h4>
                        <p>'.substr($row['content'],0,25).'<p>
                        '.$row['minprice'].' TK.
                        <a href="single.php?pid='.$row['id'].'&b=">read more</a>
                    </div>
                </div>
            ';
            }
        }  
    }
}

function checkUsersStatus(){
    include('dbcon.php');
    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    $row = $result->num_rows;
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        if($row['status'] == 1){
            echo '<li><strong>'.$row['uname'].'</strong><span class="useractive"></span></li>';
        }else{
            echo '<li><strong>'.$row['uname'].'</strong><span class="userdeactive"></span></li>'; 
        }
    }
}














