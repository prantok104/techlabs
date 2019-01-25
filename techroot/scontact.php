<?php
include 'sidebar.php';
include 'action/functions.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $update = "UPDATE contact SET status='1' WHERE id = '".$id."'";
    $result = $db->query($update);

    $sql = "SELECT * FROM `contact` WHERE id='".$id."'";
    $result = $db->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    
}





include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"> Email: <?php echo $row['uemail'];?></h4>
                </div>
                <div class="faq-list-table"  style="width:100%">
                   <b>The User Message: </b>
                    <P><?php echo $row['umsg'];?></P>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>