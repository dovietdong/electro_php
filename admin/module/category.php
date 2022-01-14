<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Thêm mới danh mục</h3>
        </div>
        <?php 
            if(isset($_POST["addNew"])){
                $cat_name = $_POST["cat_name"]; 
                $status = isset($_POST["status"])?1:0;
                $dateCreate = date("Y-m-d H:i:s");
                //viết câu lệnh truy vấn
                $sqlInsert = "INSERT INTO tbl_category(cat_name,`status`,dateCreate)";
                $sqlInsert .=" VALUES('$cat_name','$status','$dateCreate')";
                //thực thi câu lệnh truy vấn
                mysqli_query($conn,$sqlInsert) or die("Lỗi thêm mới vào CSDL");
            }
        ?>
        <form method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Nhập tên danh mục">
                </div>
               
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                    <label class="form-check-label" for="status">Trạng thái</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="addNew">Thêm mới</button>
            </div>
        </form>
    </div>
</div>
<div class="col-md-6">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Xử lý</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sqlSelectCategory = "SELECT * FROM tbl_category";
                    $data = mysqli_query($conn,$sqlSelectCategory);
                    $i=0;
                    while($row = mysqli_fetch_assoc($data)){
                        $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["cat_name"]; ?></td>
                        <td><?php echo ($row["status"])?"Hiên thị":"Ẩn"; ?></td>
                        <td><?php echo date("d-m-Y",strtotime($row["dateCreate"])); ?></td>
                        <td>
                            <a href="#" class="search-results-gallery-icon flex flex-column items-center justify-center color-inherit w-100 pa2 br2 br--top no-underline hover-bg-blue4 hover-white">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/v5.15/icons/trash-alt?style=regular" class="search-results-gallery-icon flex flex-column items-center justify-center color-inherit w-100 pa2 br2 br--top no-underline hover-bg-blue4 hover-white">
                                <i class="far fa-trash-alt" style="color:red;"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
        </div>
    </div>
</div>