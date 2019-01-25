
<!--
<section class="add-ver">
    <div class="left">
        <img src="images/add.jpg" alt="">
    </div>
    <div class="right">
        <img src="images/add.jpg" alt="">
    </div>
</section>
-->
<section class="hide-close">
    <div class="close btn-close"><i class="fa fa-close"></i></div>
</section>
<section class="active-usrs" id="hide-users">
    <ul class="users-list">
        <?php checkUsersStatus();?>
    </ul>
</section>



 </div>
  

  
  
   <footer>
    <div class="container">
        <!---->
        <div class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="latter">
                        <h6>NEWS-LETTER</h6>
                        <div class="sub-left-right">
                            <form>
                                <input type="text" value="Enter email here"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter email here';}" />
                                <input type="submit" value="SUBSCRIBE" name="subscribe">
                            </form>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="latter-right">
                        <p>FOLLOW US <a href="https://www.facebook.com/299859766854375/photos/a.302105759963109/302108113296207/?type=3&theater" target="_blank"><i class="fa fa-facebook"></i></a><a href=""><i class="fa fa-twitter"></i></a></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-bottom-cate">
                        <h6>CATEGORIES</h6>
                        <ul>
                            <li class="subitem1"><a href="product.php">Speakers </a></li>
                            <li class="subitem2"><a href="product.php">Keyboard </a></li>
                            <li class="subitem3"><a href="product.php">Mouse </a></li>
                            <li class="subitem4"><a href="product.php">Pendrive </a></li>
                            <li class="subitem5"><a href="product.php">Mobile </a></li>
                        </ul>
                    </div>
                    <div class="footer-bottom-cate bottom-grid-cat">
                        <h6>Laptops</h6>
                        <ul>
                            <li class="subitem1"><a href="product.php">ASUS </a></li>
                            <li class="subitem2"><a href="product.php">HP </a></li>
                            <li class="subitem3"><a href="product.php">DELL </a></li>
                            <li class="subitem4"><a href="product.php">LENEVO</a></li>
                            <li class="subitem5"><a href="product.php">Others</a></li>
                        </ul>
                    </div>
                    <div class="footer-bottom-cate">
                        <h6>TOP BRANDS</h6>
                        <ul>
                            <li><a href="">ASUS</a></li>
                            <li><a href="">Aser</a></li>
                            <li><a href="">Apple</a></li>
                            <li><a href="">Lenevo</a></li>
                            <li><a href="">Hp</a></li>
                            <li><a href="">DEll</a></li>
                            <li><a href="">Microsoft</a></li>
                            <li><a href="">Lenevo</a></li>
                            <li><a href="">Samsung</a></li>
                        </ul>
                    </div>
                    <div class="footer-bottom-cate cate-bottom">
                        <h6>OUR ADDERSS</h6>
                        <ul>
                            <li>Shop No. 74, </li>
                            <li>Shah Ali Plaza, 5th Floor, Mirpur-10, Dhaka-1216</li>
                            <li> </li>
                            <li >1216 Dhaka, Bangladesh</li>
                            <li class="phone">Phone : 01708178291</li>
                            <li class="phone">Phone : 01708178292</li>
                            <li class="phone">Phone : 01708178293</li>
                            <li class="phone">Phone : 01708178294</li>
                            <li class="temp"> <p class="footer-class">Powered by <a href="http://geniusictworld.com/" target="_blank">Genius ICT World</a> </p></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="js/jquery.etalage.min.js"></script>
<script>
    jQuery(document).ready(function($){

        $('#etalage').etalage({
            thumb_image_width: 300,
            thumb_image_height: 400,
            source_image_width: 900,
            source_image_height: 1200,
            show_hint: true,
            click_callback: function(image_anchor, instance_id){
                alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
            }
        });

    });
</script>
<script type="text/javascript">
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,    		
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
                portrait: { 
                    changePoint:480,
                    visibleItems: 1
                }, 
                landscape: { 
                    changePoint:640,
                    visibleItems: 2
                },
                tablet: { 
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });

    });
</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script type="text/javascript" src="js/pagination.min.js"></script>
<!--initiate accordion-->
<script type="text/javascript">
    $(function() {
        var menu_ul = $('.menu > li > ul'),
            menu_a  = $('.menu > li > a');
        menu_ul.hide();
        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });

    });
</script>

<script>
    (function($) {
        'use strict';
        $(function() {
            $("#tab").pagination({
                items: 15,
                contents: 'pegenation',
                previous: '<<',
                next: '>>',
                position: 'bottom',
            });
            
            $('.hide-close').click(function(){
                $('#hide-users').toggle( "slow" );
                $('.btn-close').html('<i class="fa fa-plus"></i>');
            });
        });
    })(jQuery);

</script>
</body>
</html>