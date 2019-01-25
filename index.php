<?php
session_start();
include('action/dbcon.php');
include('action/functions.php');
include('header.php');



?>
<div class="container">
    <div class="shoes-grid">
            <div class="wrap-in">
                <div class="wmuSlider example1 slide-grid">		 
                    <div class="wmuSliderWrapper">	
                        <article style="position: absolute; width: 100%; opacity: 0;">					
                            <img src="images/slider3.jpg" alt="">
                        </article>
                        <article style="position: absolute; width: 100%; opacity: 0;">					
                            <img src="images/slider1.jpg" alt="">
                        </article>
                        <article style="position: absolute; width: 100%; opacity: 0;">					
                            <img src="images/slider2.jpg" alt="">
                        </article>

                    </div>
                <ul class="wmuSliderPagination">
                    <li><a href="#" class="">0</a></li>
                    <li><a href="#" class="">1</a></li>
                    <li><a href="#" class="">2</a></li>
                </ul>
                <script src="js/jquery.wmuSlider.js"></script> 
                <script>
                    $('.example1').wmuSlider();         
                </script> 
            </div>
            </div>
        </a>
    <!---->
    <div class="shoes-grid-left">
        <?php lastProduct(); ?>
    </div>
    <div class="products">
        <h5 class="latest-product">LATEST PRODUCTS</h5>	
        <a class="view-all" href="product.php?sid=&pname=">VIEW ALL<span> </span></a> 		     
    </div>
    <div class="product-left">
        <?php indexProduct();?>
    </div>
    <div class="clearfix"> </div>
</div>   
<?php include('sidebar.php');?>
<?php include('footer.php');?>