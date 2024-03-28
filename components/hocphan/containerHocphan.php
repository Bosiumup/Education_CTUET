<section class="container-education">
    <?php
    // Kiểm tra nếu có yêu cầu $_GET thì sẽ thực hiện bên trong if
    if (isset($_GET['ma_ctdt'])) {
        // Lấy mã CTDĐ từ tham số truyền qua URL
        $ma_ctdt = $_GET['ma_ctdt'];
        // Truy vấn dữ liệu chi tiết CTDĐ dựa trên mã CTDĐ
        $query = "SELECT * FROM ctdt WHERE ma_ctdt = '$ma_ctdt'";
        $result = $conn->query($query);

        // Trong csdl có ít nhất 1 dòng dữ liệu thì true -> code bên trong if sẽ thực thi
        if ($result->num_rows > 0) {
            // Phương thức fetch_assoc() -> trả về một mảng key: value
            $row = $result->fetch_assoc();
            // Name chương trình đào tạo
            echo "<h1 class='heading-main-shared'>{$row['ten_ctdt']}</h1>";
        }
    }
    ?>
    <div class="grid wide majors-full">
        <!-- Events -->
        <section class="events">
            <div class="events-list">
                <div style="width: 60%;" class="event-left">
                    <!-- ADD học phần -->
                    <div class="add_hocphan">
                        <form style="display: flex; align-items: center;"
                            action=" <?php echo "index.php?page=hocphan.php&ma_ctdt=$row[ma_ctdt]" ?>" method="post">
                            <select name="dsmh" id="dsmh">
                                <?php
                                $result_dsmh = getHocphan($conn);
                                while ($row = $result_dsmh->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row["ma_mon_hoc"] ?>"><?php echo $row["ten_mon_hoc"] ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                            <button style="margin-right: 0;" type="submit" name="add_submit">THÊM HỌC
                                PHẦN</button>
                        </form>
                    </div>
                </div>


                <div class="event-right">
                    <!-- Search -->
                    <form
                        action="<?php echo isset($row) ? "index.php?page=hocphan.php&ma_ctdt={$row['ma_ctdt']}" : '' ?>"
                        method="post">
                        <div class="search-form">
                            <input type="text" placeholder="Nhập học phần" name="hoc_phan_search">
                            <button type="submit">Tra cứu</button>
                        </div>
                    </form>
                </div>
                <!-- End -->
            </div>
        </section>
        <!-- End -->

        <!-- Table majors -->
        <table id="table-majors">
            <!-- Heading table -->
            <thead id="table-head">
                <tr class="row-h">
                    <th class="col-h">Mã học phần</th>
                    <th class="col-h w-25">Tên học phần</th>
                    <th class="col-h">Học kì</th>
                    <th class="col-h">Số tín chỉ</th>
                    <th class="col-h">Số tiết lý thuyết</th>
                    <th class="col-h">Số tiết thực hành</th>
                    <th class="col-h">Cập nhật</th>
                    <th class="col-h">Xóa</th>
                </tr>
            </thead>
            <!-- End -->

            <!-- Body table -->
            <tbody id="table-body">
                <?php
                require "tableHocphan.php";
                ?>
            </tbody>
            <!-- End -->
        </table>
        <!-- End -->

        <!-- events button -->
        <!-- <form action="<?php // echo "index.php?page=hocphan.php&ma_ctdt=$ma_ctdt";  
                            ?>" method="post">
        <div class="option-cart events-list" style="justify-content: center; margin-top: 30px;">
            <button class="btn-cart fz-17" type="submit" name='delete_all_hp'>
                <span>Xóa tất cả</span>
            </button>
        </div>
    </form> -->

        <!-- Animation load page -->
        <section class="dots-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </section>

    </div>
</section>
<!-- End -->