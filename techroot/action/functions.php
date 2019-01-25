<?php
include ('dbcon.php');

function getthelink($table){
    include('dbcon.php');
    $sql = "SELECT * FROM $table";
    $result = $db->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }

}

// Get the status id and return quality od brand

if(isset($_POST['value'])){
    $sid = $_POST['value'];
    if($sid == 1){
        $sql = "SELECT * FROM `quality`";
        $result = $db->query($sql);
        echo '<select name="quality" id="quality" class="form-control">';
            
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
        echo '</select>
        <input type="hidden" value="A" name="findout">
        
        ';
    }elseif($sid >=2 && $sid <=4){
        $sql = "SELECT * FROM `brand`";
        $result = $db->query($sql);
        echo '<select name="quality" id="quality" class="form-control">';

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }
        echo '</select>
        <input type="hidden" value="B" name="findout">
        ';
    }elseif($sid >=5 && $sid == 0){
    }
}

// Insert product
if(isset($_POST['pro-btn'])){
   
    $imageName = $_FILES['image']['name'];
    $imageData = mysqli_real_escape_string($db, file_get_contents($_FILES['image']['tmp_name']));
    $imageType = $_FILES['image']['type'];
    
    $pname = $_POST['title'];
    $content = $_POST['content'];
    $maxval = $_POST['maxval'];
    $minval = $_POST['minval'];
    $status = $_POST['status'];
    $quality = $_POST['quality'];
    $check = $_POST['findout'];
    
    if(empty($imageData) || empty($pname) || empty($content) || empty($minval) || empty($status)){
        $location = 'location:../products.php?er=1';
        header($location);
    }else{
        if(substr($imageType,0,5) == 'image'){
            $sql = "INSERT INTO `products`(`title`, `content`, `minprice`, `maxprice`, `image`, `imgtype` , `status`, `quality`, `action`) VALUES ('$pname','$content','$minval','$maxval','$imageData','$imageType','$status','$quality','$check')";
            $result = $db->query($sql);
            if($result){
                $location = 'location:../products.php?er=3';
                header($location);
            }
        }else{
            $location = 'location:../products.php?er=2';
            header($location);
        }
    }
    
    

}

//Product Image Output
if(isset($_GET['imid'])){
    $id = $_GET['imid'];
    $sql = "SELECT * FROM products WHERE id ='".$id."'";
    $result = $db->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $imageData = $row['image'];
        $imageType= $row['imgtype'];
    }
    header('content-type: image/"'.$imageType.'"');
    echo $imageData;
}


// product Delete
if(isset($_GET['pdid'])){
    $sql = "DELETE FROM products WHERE id = '".$_GET['pdid']."'";
    $result = $db->query($sql);
    if($result){
        $location = 'location:../productlist.php?er=0';
        header($location);
    }
}

// Get the All users in users table

function getallusers(){
    include('dbcon.php');
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $result = $db->query($sql);
    $count =1;
    $rows = $result->num_rows;
    if($rows == 0){
        echo 'have No Users';
    }else{
        echo '<thead class="bg-primary">
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            UserName
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Status
                          </th>
                        </tr>
                      </thead>';
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo '
            <tr>
              <td class="font-weight-medium">
                '.$count++.'
              </td>
              <td>
                '.$row['uname'].'
              </td>
              <td>
                '.$row['email'].'
              </td>
              <td>
                '.$row['phone'].'
              </td>
                 <td> ';
            if($row['status'] == 0){
                echo 'Inactive';
            }else{
                echo 'Active';

            }'</td>
            </tr>
        ';
        }
    }
    
}


// Get the all Contact 

function getthecontact($value){
    include('dbcon.php');
    $sql = "SELECT * FROM `contact` WHERE status =$value ORDER BY id DESC";
    $result = $db->query($sql);
    
    $row = $result->num_rows;
    if($row == 0){
        echo 'Have no Message';
    }else{
        $count = 1;
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo '<td>'.$count++.'</td>
                <td>
                '.$row['uname'].'
              </td>
              <td>
                '.$row['uemail'].'
              </td>
              <td>
              <a href="scontact.php?id='.$row['id'].'" >
                '.substr($row['umsg'], 0, 20).'
              </a></td>';
        }
    }
}


// Product Update
if(isset($_POST['pro-edit-button'])){
    $peid = $_POST['peid'];
    $imageName = $_FILES['image']['name'];
    $imageData = mysqli_real_escape_string($db, file_get_contents($_FILES['image']['tmp_name']));
    $imageType = $_FILES['image']['type'];

    $pname = $_POST['title'];
    $content = $_POST['content'];
    $maxval = $_POST['maxval'];
    $minval = $_POST['minval'];
    $status = $_POST['status'];
    $quality = $_POST['quality'];
    $check = $_POST['findout'];

    if(empty($status)){
        $location = 'location:../productedit.php?er=1&peid='.$peid;
        header($location);
    }else{
        if(substr($imageType,0,5) == 'image'){
            $sql = "UPDATE products SET title='".$pname."', content='".$content."', minprice='".$minval."', maxprice='".$maxval."', image='".$imageData."', imgtype='".$imageType."', status='".$status."', quality='".$quality."', action='".$check."' WHERE id='".$peid."'";
            $result = $db->query($sql);
            if($result){
                $location = 'location:../productedit.php?er=3&peid='.$peid;
                header($location);
            }
        }else{
            $location = 'location:../productedit.php?er=2&peid='.$peid;
            header($location);
        }
    }
}


// Total Users

function totalUser(){
    include('dbcon.php');
    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    $row = $result->num_rows;
    if($row == 0){
        echo 'Have No User';
    }
    echo $row;
}
// Total Users

function activeUser(){
    include('dbcon.php');
    $sql = "SELECT * FROM users WHERE status =1";
    $result = $db->query($sql);
    $row = $result->num_rows;
    if($row == 0){
        echo 'Have No User';
    }else{
        echo $row;
    }
    
}










































































































// FAQ insert in faq Table
if(isset($_POST['faq-button'])){
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    
    if(empty($heading) || empty($content)){
        $location = 'location:../faq.php?er=1';
        header($location);
    }else{
        $check = "SELECT * FROM faq WHERE heading='".$heading."'";
        $result = $db->query($check);
        $row = $result->num_rows;
        if($row>=1){
            $location = 'location:../faq.php?er=2';
            header($location);
        }else{
            $faqsql = "INSERT INTO `faq`(`heading`, `content`) VALUES ('".$heading."','".$content."')";
            $result = $db->query($faqsql);
            if($result){
                $location = 'location:../faq.php?er=3';
                header($location);
            }
        }
    }
}

// FAQ Edit 
if(isset($_POST['faq-edit-button'])){
    $feid = $_POST['fid'];
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    
    if(empty($heading) || empty($content)){
        $location = 'location:../faqedit.php?feid='.$feid.'&er=1';
        header($location);
    }else{
        $check = "SELECT * FROM faq WHERE heading='".$heading."'";
        $result = $db->query($check);
        $row = $result->num_rows;
        if($row>1){
            $location = 'location:../faqedit.php?feid='.$feid.'&er=2';
            header($location);
        }else{
            $update = "UPDATE faq SET heading='".$heading."' , content = '".$content."' WHERE id='".$feid."'";
            $result = $db->query($update);
            if($result){
                $location = 'location:../faqedit.php?feid='.$feid.'&er=3';
                header($location);
            }
        }
    }
}
// FAQ Delete
if(isset($_GET['fdid'])){
    $fdid = $_GET['fdid'];
    $sql = "DELETE FROM faq WHERE id = '".$fdid."'";
    $result = $db->query($sql);
    if($result){
        $location = 'location:../faqlist.php?er=0';
        header($location);
    }
}

// FAQ active
if(isset($_GET['faid'])){
    $faid = $_GET['faid'];
    $update = "UPDATE faq SET status='1' WHERE id='".$faid."'";
    $result = $db->query($update);
    if($result){
        $location = 'location:../faqlist.php?er=0';
        header($location);
    }
}



// FAQ Deactive

if(isset($_GET['fdeid'])){
    $fdeid = $_GET['fdeid'];
    $update = "UPDATE faq SET status='0' WHERE id='".$fdeid."'";
    $result = $db->query($update);
    if($result){
        $location = 'location:../faqlist.php?er=0';
        header($location);
    }
}




