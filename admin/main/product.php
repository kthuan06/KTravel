<?php
include('config/config.php');
 if(isset($_GET['query']) && $_GET['query'] == 'add'){
 
?>
<div class="" style="width: 100%; margin-top: 50px;">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">ADD PRODUCT</h4>

        <form class="forms-sample" action="main/productprocess.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <label for="name">NAME</label>
            <input type="text" class="form-control text-white" name="name" placeholder="Name">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">CODE</label>
            <input type="text" class="form-control text-white" name="code" placeholder="Code">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">TYPE</label>
            <select name="type" id="" class="form-control text-white">
                <option value="" selected disabled>---CHỌN---</option>
                <option value="Trong nước">Trong nước</option>
                <option value="Ngoài nước">Ngoài nước</option>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">LOCATION</label>
            <select name="location" id="" class="form-control text-white">
                <option value="" selected disabled>---CHỌN---</option>
                <?php
                    $sql_select = mysqli_query($mysqli, "SELECT *FROM tbl_cartegory");
                    while($row_type = mysqli_fetch_array($sql_select)){
                ?>
                <option value="<?php echo $row_type['cartegory_name'] ?>"><?php echo $row_type['cartegory_name'] ?></option>
                <?php        
                    }
                    ?>
            </select>
            </div>
            <div class="form-group">
            <label for="price">PRICE</label>
            <input type="text" class="form-control text-white" name="price" placeholder="Price">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">DETAIL</label>
            <textarea name="detail" id="" class="form-control text-white" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
            <label for="img">IMAGE PRODUCT</label>
            <input type="file" class="form-control" name="img">
            </div>
            <div class="form-group">
            <label for="img1">IMAGE DESCRIBE 1</label>
            <input type="file" class="form-control" name="img1">
            </div>
            <div class="form-group">
            <label for="img2">IMAGE DESCRIBE 2</label>
            <input type="file" class="form-control" name="img2">
            </div>
            <div class="form-group">
            <label for="img3">IMAGE DESCRIBE 3</label>
            <input type="file" class="form-control" name="img3">
            </div>
            <div class="form-group">
            <label for="img4">IMAGE DESCRIBE 4</label>
            <input type="file" class="form-control" name="img4">
            </div>
            <button type="submit" class="btn btn-primary me-2" name="add">ADD</button>
        </form>
        </div>
    </div>
</div>
<?php
 }elseif(isset($_GET['query']) && $_GET['query'] == 'edit'){
    $sql_edit = mysqli_query($mysqli, "SELECT *FROM tbl_product WHERE product_code = '".$_GET['id']."'");
    while($row_edit = mysqli_fetch_array($sql_edit)){
 ?>
 <div class="" style="width: 100%; margin-top: 50px;"> 
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">EDIT CONTENT</h4>

        <form class="forms-sample" action="main/productprocess.php?id=<?php echo $row_edit['product_code'] ?>" method="POST">
            <div class="form-group">
            <label for="exampleInputUsername1">NAME</label>
            <td> <input type="text" class="form-control text-white" name="name" value="<?php echo $row_edit['product_name'] ?>"> </td>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">TYPE</label>
            <select name="type" id="" class="form-control text-white">
                    <?php
                    if($row_edit['product_type'] == 'Trong nước'){
                    ?>
                    <option value="Trong nước" selected>Trong nước</option>
                    <option value="Ngoài nước">Ngoài nước</option>
                    <?php
                    }elseif($row_edit['product_type'] == 'Ngoài nước'){
                        ?>
                        <option value="Trong nước" >Trong nước</option>
                        <option value="Ngoài nước" selected>Ngoài nước</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">LOCATION</label>
            <select name="location" id="" class="form-control text-white">
              <option value="<?php echo $row_edit['product_location'] ?>" selected><?php echo $row_edit['product_location'] ?></option>
              <?php
              $sql_location = mysqli_query($mysqli, "SELECT *FROM tbl_cartegory");
              while($row_location = mysqli_fetch_array($sql_location)){
              ?>
              <option value="<?php echo $row_location['cartegory_name'] ?>"><?php echo $row_location['cartegory_name'] ?></option>
              <?php
              }
              ?>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">PRICE</label>
            <input type="text" class="form-control text-white" name="price" value="<?php echo number_format($row_edit['product_price'], 2,',' , '.')  ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">DETAIL</label>
              <textarea name="detail" id="detail" cols="30" rows="3" style="width: 100%; background-color: #2A3038  ; color: white;"><?php echo $row_edit['product_detail']  ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary me-2" name="edit">EDIT</button>
        </form>
        </div>
    </div>
</div>
 <?php
    }
}elseif(isset($_GET['query']) && $_GET['query'] == 'delete'){
  $sql_sl = mysqli_query($mysqli, "SELECT *FROM tbl_product WHERE product_code = '".$_GET['id']."' LIMIT 1");
  while($row_delete = mysqli_fetch_array($sql_sl)){
    unlink('main/uploads/'.$row_delete['product_img']);
    unlink('main/uploads/'.$row_delete['img_product1']);
    unlink('main/uploads/'.$row_delete['img_product2']);
    unlink('main/uploads/'.$row_delete['img_product3']);
    unlink('main/uploads/'.$row_delete['img_product4']);
  }
    $sql_delete = mysqli_query($mysqli, "DELETE FROM tbl_product WHERE product_code = '".$_GET['id']."' ");
}


elseif(isset($_GET['query']) && $_GET['query'] == 'editimg'){
  $sql_edit_img = mysqli_query($mysqli, "SELECT *FROM tbl_product WHERE product_code = '".$_GET['id']."'");
  while($row_edit_img = mysqli_fetch_array($sql_edit_img)){
?>
<form style="margin-top: 30px;" action="main/productprocess.php?id=<?php echo $row_edit_img['product_code'] ?>" method="post" enctype="multipart/form-data"> 
  <div class="form-group">
    <label for="exampleInputEmail1">IMAGE</label>
    <div style="display: flex;"> 
    <input type="file" style="width: 50%;" class="form-control text-white" name="img">
    <img style="width: 30%;" src="main/uploads/<?php echo  $row_edit_img['product_img'] ;?>" alt="">
    </div>  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">IMAGE DESCRIBE 1</label>
    <div style="display: flex;"> 
    <input type="file" style="width: 50%;" class="form-control text-white" name="img1">
    <img style="width: 30%;" src="main/uploads/<?php echo $row_edit_img['img_product1']  ;?>" alt="">
    </div>  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">IMAGE DESCRIBE 2</label>
    <div style="display: flex;"> 
    <input type="file" style="width: 50%;" class="form-control text-white" name="img2">
    <img style="width: 30%;" src="main/uploads/<?php echo $row_edit_img['img_product2']  ;?>" alt="">
    </div>  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">IMAGE DESCRIBE 3</label>
    <div style="display: flex;"> 
    <input type="file" style="width: 50%;" class="form-control text-white" name="img3">
    <img style="width: 30%;" src="main/uploads/<?php echo $row_edit_img['img_product3']  ;?>" alt="">
    </div>  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">IMAGE DESCRIBE 4</label>
    <div style="display: flex;"> 
    <input type="file" style="width: 50%;" class="form-control text-white" name="img4">
    <img style="width: 30%;" src="main/uploads/<?php echo $row_edit_img['img_product4']  ;?>" alt="">
    </div>  
  </div>
  <button type="submit" class="btn btn-primary me-2" name="editimg">EDIT</button>
  </form>
<?php
  }
}
?>
<div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Content table</h4>
                  
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Code </th>
                            <th> Type </th>
                            <th> Location </th>
                            <th> Price </th>
                            <th> Detail </th>
                            <th> Management </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sql_query = mysqli_query($mysqli, "SELECT *FROM tbl_product ") ;

                            while($row = mysqli_fetch_array($sql_query)){
                            ?>
                          <tr>
                            <td> <?php echo $row['product_id'] ?> </td>
                            <td> <?php echo $row['product_name'] ?> </td>
                            <td> <?php echo $row['product_code'] ?> </td>
                            <td> <?php echo $row['product_type'] ?> </td>
                            <td> <?php echo $row['product_location'] ?> </td>
                            <td> <?php echo $row['product_price'] ?> </td>
                            <td> <textarea name="" id="" cols="30" rows="5" style="width: 100% ; background-color: #2A3038  ; color: white;"><?php echo $row['product_detail'] ?></textarea> </td>
                            

                            <td> <button class="btn btn-success "><a href="index.php?action=product&query=edit&id=<?php echo $row['product_code'] ?>" style="text-decoration: none; color: white;">EDIT</a></button> /
                             <button class="btn btn-danger"><a style="text-decoration: none; color: white;" href="index.php?action=product&query=delete&id=<?php echo $row['product_code'] ?>">DELETE</a></button> </td>
                          </tr>
                          <?php 
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Image table</h4>
                  
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Img </th>
                            <th> Img1 </th>
                            <th> Img2 </th>
                            <th> Img3 </th>
                            <th> Img4 </th>
                            <th> Management </th>
                           
                            
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sql_query = mysqli_query($mysqli, "SELECT *FROM tbl_product ") ;

                            while($row = mysqli_fetch_array($sql_query)){

                            
                            ?>
                          <tr>
                            <td> <?php echo $row['product_id'] ?> </td>
                            <td> <img style="border-radius: unset; width: 100%; height: 120px;" src="main/uploads/<?php echo $row['product_img'] ?>" alt=""> </td>
                            <td> <img style="border-radius: unset; width: 100%; height: 120px;" src="main/uploads/<?php echo $row['img_product1'] ?>" alt="">  </td>
                            <td> <img style="border-radius: unset; width: 100%; height: 120px;" src="main/uploads/<?php echo $row['img_product2'] ?>" alt=""> </td>
                            <td> <img style="border-radius: unset; width: 100%; height: 120px;" src="main/uploads/<?php echo $row['img_product3'] ?>" alt="">  </td>
                            <td> <img style="border-radius: unset; width: 100%; height: 120px;" src="main/uploads/<?php echo $row['img_product4'] ?>" alt="">  </td>

                            <td> <button class="btn btn-success "><a href="index.php?action=product&query=editimg&id=<?php echo $row['product_code'] ?>" style="text-decoration: none; color: white;">EDIT</a></button> /
                             <button class="btn btn-danger"><a style="text-decoration: none; color: white;" href="index.php?action=product&query=delete&id=<?php echo $row['product_code'] ?>">DELETE</a></button> </td>
                          </tr>
                          <?php 
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
</div>