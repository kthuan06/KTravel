<?php
    if(isset($_POST['reply_btn'])){
        $sql = mysqli_query($mysqli, "INSERT INTO tbl_reply(id_cmt, comment) VALUES ('".$_POST['id_cmt']."','".$_POST['reply']."')" );
    }
    if(isset($_GET['query']) && $_GET['query'] == 'delete'){
      $id_cmt = $_GET['id'];
      $sql_delete = mysqli_query($mysqli, "DELETE FROM tbl_comment WHERE id = '".$_GET['id']."' ");
    }
?>

<div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Comment table</h4>
                  
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> ID </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> USER NAME </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> CODE PRODUCT </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> COMMENT </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> MANAGER </th>

                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sql_query = mysqli_query($mysqli, "SELECT *FROM tbl_comment ") ;

                            while($row = mysqli_fetch_array($sql_query)){

                            
                            ?>
                          <tr>
                            <td> <?php echo $row['id'] ?> </td>
                            <td> <?php echo $row['user_name'] ?> </td>
                            <td> <?php echo $row['id_product'] ?> </td>
                           
                            <td><textarea name="" id="" cols="30" rows="5" style="width: 100% ; background-color: #2A3038  ; color: white;"><?php echo $row['comment_content'] ?></textarea>  </td>
                            <td> 
                            <form action="#" method="POST">
                                <input name="reply" type="text" autocomplete="off">
                                <input name="id_cmt" type="text" style="display: none;" value="<?php echo $row['id'] ?>">    
                                                      
                            <button type="submit" name="reply_btn" class="btn btn-success ">REPLY</button> /
                             <button class="btn btn-danger"><a style="text-decoration: none; color: white;" href="index.php?action=comment&query=delete&id=<?php echo $row['id'] ?>">DELETE</a></button> </td>
                            </form>  
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
