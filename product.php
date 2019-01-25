<?php 
session_start();
include('action/dbcon.php');
include('action/functions.php');
include('header.php');
?>
<div class="container">
    <div class="women-product ">
        <!-- grids_of_4 -->
        <div class="grid-product pegenation">
            <?php
               $status = $_GET['sid'];
               $pname = $_GET['pname'];
                if($status == 10){
                    productBYStatusAndName($status, $pname);
                }
                else if($status>=1){
                    productBYStatusAndName($status, $pname);
                }else{
                    $sql = "SELECT * FROM products order by id DESC";
                    $result = $db->query($sql);
                    $count = 1;
                    while($row = $result->fetch_array(MYSQLI_ASSOC)){
                        echo '
                            <div class="  product-grid">
                                <div class="content_box">
                                    <a href="single.php?pid='.$row['id'].'&b=">
                                        <div class="left-grid-view grid-view-left">
                                            <img src="admin/action/functions.php?imid='.$row['id'].'" class="img-responsive watch-right" alt=""/>
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
            ?>
        </div>
        <div id="tab"></div>
    </div>
    <?php include('sidebar.php');?>
    <?php include('footer.php');?>