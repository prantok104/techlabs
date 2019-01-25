<?php
include 'header.php';
include 'sidebar.php';
include 'action/functions.php';

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"> <i class="menu-icon mdi mdi-content-copy"></i> All Products Lists</h4>
                </div>
                <div class="faq-list-table"  style="width:100%">
                    <table class="table table-striped text-center" >
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center ">#</th>
                                <th class="text-center ">image</th>
                                <th class="text-center ">Heading</th>
                                <th class="text-center ">Content</th>
                                <th class="text-center ">Min. Price</th>
                                <th class="text-center ">Max Price</th>
                                <th class="text-center ">Action</th>
                            </tr>
                        </thead>
                        <tbody class="pegenation">
                            <?php 
                                $faqlist = "SELECT * FROM products order by id DESC";
                                $result = $db->query($faqlist);
                                $count = 1;
                                while($row = $result->fetch_assoc()){
                                    echo'
                                    <tr>
                                        <td>'.$count++.'</td>
                                        <td><img src="action/functions.php?imid='.$row['id'].'"></td>
                                        <td>'.$row['title'].'</td>
                                        <td>'.substr($row['content'],0,30).'</td>
                                        <td>'.$row['minprice'].' Tk. </td>
                                        <td>'.$row['maxprice'].' Tk. </td>
                                        <td>
                                            <a href="productedit.php?peid='.$row['id'].'&er=0" class="btn btn-xs btn-primary">Edit</a>
                                            <a href="action/functions.php?pdid='.$row['id'].'" class="btn btn-xs btn-danger">Delete</a>
                                        </td>
                                        <td>
                                    </tr>';    
                                } 
                            ?>
                        </tbody>
                    </table>
                    <div id="tab"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>