<?php
include('config/config.php');
 if(isset($_GET['query']) && $_GET['query'] == 'add'){
 
?>
<div class="" style="width: 100%; margin-top: 50px;">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">ADD MENU</h4>

        <form class="forms-sample" action="main/menuprocess.php" method="POST">
            <div class="form-group">
            <label for="exampleInputUsername1">NAME</label>
            <input type="text" class="form-control text-white" name="name" placeholder="Name">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">MENU ADDRESS</label>
            <input type="text" class="form-control text-white" name="address" placeholder="Address">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">MENU CODE</label>
            <input type="text" class="form-control text-white" name="code" placeholder="Code">
            </div>
            
            <button type="submit" class="btn btn-primary me-2" name="add">ADD</button>
        </form>
        </div>
    </div>
</div>
<?php
 }elseif(isset($_GET['query']) && $_GET['query'] == 'edit'){
    $sql_edit = mysqli_query($mysqli, "SELECT *FROM list_menu WHERE list_id = '".$_GET['id']."'");
    while($row_edit = mysqli_fetch_array($sql_edit)){
 ?>
 <div class="" style="width: 100%; margin-top: 50px;"> 
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">EDIT MENU</h4>

        <form class="forms-sample" action="main/menuprocess.php?id=<?php echo $row_edit['list_id'] ?>" method="POST">
            <div class="form-group">
            <label for="exampleInputUsername1">NAME</label>
            <input type="text" class="form-control text-white" name="name" value="<?php echo   $row_edit['list_name'] ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">MENU ADDRESS</label>
            <input type="text" class="form-control text-white" name="address" value="<?php echo $row_edit['list_address'] ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">MENU CODE</label>
            <input type="text" class="form-control text-white" name="code" value="<?php echo $row_edit['list_code'] ?>">
            </div>
            
            <button type="submit" class="btn btn-primary me-2" name="edit">EDIT</button>
        </form>
        </div>
    </div>
</div>
 <?php
    }
}else{
    $sql_delete = mysqli_query($mysqli, "DELETE FROM  list_menu WHERE list_id = '".$_GET['id']."' ");   
    header('Location:../index.php?action=menu&query=add');
}
?>

<div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bordered table</h4>
                  
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Adress </th>
                            <th> Code </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sql_query = mysqli_query($mysqli, "SELECT *FROM list_menu ") ;

                            while($row = mysqli_fetch_array($sql_query)){

                            
                            ?>
                          <tr> 
                            <td> <?php echo $row['list_id'] ?> </td>
                            <td> <?php echo $row['list_name'] ?> </td>
                            <td> <?php echo $row['list_address'] ?> </td>
                            <td> <?php echo $row['list_code'] ?> </td>
                            <td> <button class="btn btn-success "><a href="index.php?action=menu&query=edit&id=<?php echo $row['list_id'] ?>" style="text-decoration: none; color: white;">EDIT</a></button> /
                             <button class="btn btn-danger"><a style="text-decoration: none; color: white;" href="index.php?action=menu&query=delete&id=<?php echo $row['list_id'] ?>">DELETE</a></button> </td>
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