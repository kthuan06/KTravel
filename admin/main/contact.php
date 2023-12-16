<div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Contact table</h4>
                  
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> CODE </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> NAME </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> EMAIL </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> PHONENUMBER </th>
                            <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"> MESSAGE </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sql_query = mysqli_query($mysqli, "SELECT *FROM tbl_contact ") ;

                            while($row = mysqli_fetch_array($sql_query)){

                            
                            ?>
                          <tr>
                            <td> <?php echo $row['contact_id'] ?> </td>
                            <td> <?php echo $row['contact_name'] ?> </td>
                            <td> <?php echo $row['contact_email'] ?> </td>
                            <td> <?php echo $row['contact_phonenumber'] ?> </td>
                            <td><textarea name="" id="" cols="30" rows="5" style="width: 100% ; background-color: #2A3038  ; color: white;"><?php echo $row['contact_mess'] ?></textarea>  </td>
                         
                           
                            
                          <?php 
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
