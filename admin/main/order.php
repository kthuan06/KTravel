<?php
if(isset($_POST['confirm'])){
  $sql_state = mysqli_query($mysqli, "UPDATE tbl_cart SET cart_status = 0 WHERE code_cart = '".$_POST['idcart']."' ");
}
if(isset($_GET['query']) && $_GET['query'] == 'view'){


  ?>
<div class="" style="margin-top: 50px;">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order details</h4>
                  
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> CODE </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> PRICE </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> QUANTITY </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> NAME </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> IAMGE </th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sql_query = mysqli_query($mysqli, "SELECT *FROM tbl_cart_details WHERE code_cart = '$_GET[id]' ") ;

                            while($row = mysqli_fetch_array($sql_query)){
                              $sql_2 = mysqli_query($mysqli, "SELECT *FROM tbl_product WHERE product_code = '".$row['id_product']."' LIMIT 1 ");
                              while($row2 = mysqli_fetch_array($sql_2)){
                                
                            ?>
                          <tr>
                            <td> <?php echo $row['id_product'] ?> </td>
                            <td> <?php echo $row2['product_price'] ?> </td>
                            <td> <?php echo $row['amout_product'] ?> </td>
                            <td> <?php echo $row2['product_name'] ?> </td>
                           <td> <img style="border-radius: unset; width: 100%; height: 120px;" src="main/uploads/<?php echo $row2['product_img'] ?>" alt=""></td>
                          </tr>

                          <?php 
                            }
                            }
                            ?>
                        </tbody>
                      </table>
                      <div class="nav mt-5">
                        <form action="" method="post">
                          <input style="display: none;" type="text" value="<?php echo $_GET['id']?>" name="idcart">
                      <button class="p-3 btn btn-success m-auto" type="submit" name="confirm">Confirm</button></form> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>



  <?php
}
?>


<div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order table</h4>
                  
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> CODE </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> PRICE </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> CUSTOMER NAME </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> EMAIL </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> ADDRESS </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> PHONENUMBER </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> NOTE </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> STATE </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> PAYMENTS </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> MANAGER </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sql_query = mysqli_query($mysqli, "SELECT *FROM tbl_cart ") ;

                            while($row = mysqli_fetch_array($sql_query)){

                            
                            ?>
                          <tr>
                            <td> <?php echo $row['code_cart'] ?> </td>
                            <td> <?php echo $row['cart_price'] ?> </td>
                            <td> <?php echo $row['cart_name'] ?> </td>
                            <td> <?php echo $row['cart_email'] ?> </td>
                            <td> <?php echo $row['cart_address'] ?> </td>
                            <td> <?php echo $row['cart_phone'] ?> </td>
                            <td> <?php echo $row['cart_note'] ?> </td>
                            <?php 
                            if($row['cart_status'] == 1){
                              ?>
                              <td> Chưa xác nhận </td>
                              <?php
                            }else{
                              ?>
                              <td> Đã xác nhận </td>
                              <?php
                            }
                            ?>
                            <?php 
                            if($row['cart_payments'] == 1){
                              ?>
                              <td> Khi nhận hàng </td>
                              <?php
                            }else{
                              ?>
                              <td> VNPAY </td>
                              <?php
                            }
                            ?>
                            <td>  <button class="btn btn-success "><a href="index.php?action=order&query=view&id=<?php echo $row['code_cart'] ?>" style="text-decoration: none; color: white;">VIEW</a></button> /
                                <button class="btn btn-success "><a href="main/sendmail.php?type=confirm&email=<?php echo $row['cart_email'] ?>&id=<?php echo $row['code_cart'] ?>" style="text-decoration: none; color: white;">SENT</a></button> /
                             <button class="btn btn-danger"><a style="text-decoration: none; color: white;" href="index.php?action=menu&query=delete&id=<?php echo $row['code_cart'] ?>">DELETE</a></button> </td>
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
