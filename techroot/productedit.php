<?php
include 'action/functions.php';
include 'header.php';
include 'sidebar.php';


//Get the value from faq table by using feid
$sql = "SELECT * FROM products WHERE id='".$_GET['peid']."'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"> <i class="menu-icon mdi mdi-content-copy"></i> Product Update</h4>
                    <p class="card-description text-center">
                        Product Edit Form
                    </p>
                    <form action="action/functions.php" method="POST" class="forms-sample" enctype="multipart/form-data">
                       <div class="form-group">
                           <label for="photo"><img src="action/functions.php?imid=<?php echo $_GET['peid'];?>" alt=""> <span>Product Image</span></label>
                           <input type="file" name="image" id="photo" style="display:none;" >
                       </div>
                       
                        <div class="form-group">
                            <label for="title">Product Title</label>
                            <input type="text" class="form-control" id="title"  value="<?php echo $row['title'];?>" name="title">
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Product Content</label>
                            <textarea name="content" id="content" cols="30" rows="10"  class="form-control"><?php echo htmlspecialchars($row['content']);?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="minval">Minimum Price</label>
                            <input type="text" class="form-control" id="minval" name="minval" placeholder="Maximum Price" value="<?php echo $row['minprice'];?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="maxval">Maximum Price</label>
                            <input type="text" class="form-control" id="maxval" name="maxval" placeholder="Minimum Price" value="<?php echo $row['maxprice'];?>">
                        </div>
                        
                        <div class="form-group">
                            <select name="status" id="status" class="form-control">
                                <option value="0" selected="selected">Select the Quality</option>
                                <?php getthelink('status');?>
                            </select>
                        </div>
                        
                        <div class="form-group" id="output">

                        </div>
                        <input type="hidden" name="peid" value="<?php echo $_GET['peid'];?>">
                        <button type="submit" class="btn btn-success mr-2" name="pro-edit-button">Submit</button>
                        <button class="btn btn-light" type="reset">Reset</button>
                        <?php
                        if($_GET['er']==0){

                        }
                        elseif($_GET['er']==1){
                            echo '<b class="alert alert-danger"> :):) Something is missing !</b>';
                        }
                        elseif($_GET['er']==2){
                            echo '<b class="alert alert-danger"> :):) Only use as Image</b>';
                        }
                        elseif($_GET['er']==3){
                            echo '<b class="alert alert-success">Update Successfully Completed</b>';
                        }



                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
<script>
    $(document).ready(function(){
        $('#status').change(function(){
            var value = $(this).val();
            if(value!=''){
                $.ajax({
                    url:'action/functions.php',
                    method:'POST',
                    data:{value : value},
                    success:function(data){
                        $('#output').html(data);
                    }
                });
            }
        });
    });
</script>