<?php 
session_start();
include('action/dbcon.php');
include('action/functions.php');

if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    if($_GET['b'] == ''){
        $sql = "SELECT * FROM products WHERE id ='".$pid."'";
        $result = $db->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
    }
}




include('header.php');
?>
        <div class="container"> 

            <div class=" single_top">
                <div class="single_grid">
                    <div class="grid images_3_of_2">
                        <ul id="etalage">
                            <li>
                                <a href="optionallink.php">
                                    <img class="etalage_thumb_image" src="admin/action/functions.php?imid=<?php echo $_GET['pid'];?>" class="img-responsive" />
                                    <img class="etalage_source_image" src="admin/action/functions.php?imid=<?php echo $_GET['pid'];?>" class="img-responsive" title="" />
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"> </div>		
                    </div> 
                    <div class="desc1 span_3_of_2">


                        <h4><?php echo $row['title'];?></h4>
                        <div class="cart-b">
                            <div class="left-n ">$<?php echo $row['minprice'];?></div>
                            <a class="now-get get-cart-in" href="contact.php?e=0">ADD TO CART</a> 
                            <div class="clearfix"></div>
                        </div>
                        <p><?php echo substr($row['content'], 0, 30);?>....</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="toogle">
                    <h3 class="m_3">Product Details</h3>
                    <p class="m_text"><?php echo $row['content'];?></p>
                </div>	
            </div>

            <!---->
            <?php include('sidebar.php');?>
            <?php include('footer.php');?>