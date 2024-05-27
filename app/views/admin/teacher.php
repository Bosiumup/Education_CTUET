<?php
    require "app/controllers/teacher_controller.php";
    $epController = new Teacher_Controller();
    $epController->add();              
    $epController->update(); 
    $epController->delete();
    // $epController->search();

?>

<section class="container-students">
    <div class="grid wide majors-full">
        <!-- Events -->
        <section class="events">
            <div class="events-list">
                <div class="event-left">
                    <!-- Add EP -->
                    <button id="TCOpenFormAdd" type="button">Thêm</button>
                    <div id="TCMyModalAdd" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <img src="public/imgs/logo.png" alt="logo">
                            <form style="width: 100%; display: inline-block;" action="?page=teacher" method="POST">
                                <label>
                                    <select name="TCselectOption">
                                        <?php
                                $result = Faculty($conn); // Gọi hàm Faculty() và lưu kết quả trả về vào biến $result
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["KhoaID"] . '">' . $row["KhoaID"] . '</option>';
                                    }
                                }
                            ?>
                                    </select>
                                </label>
                                <label>
                                    <input type="text" name="TenGiangVien" placeholder="Thiện Phạm,..." required
                                        value="<?php echo isset($_SESSION['TenGiangVien']) ? $_SESSION['TenGiangVien'] : '' ?>">
                                </label>
                                <label>
                                    <input type="text" name="Email" placeholder="email@gmail.com" required
                                        value="<?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : '' ?>">
                                </label>
                                <label>
                                    <input type="text" name="SoDienThoai" placeholder="0999991111" required
                                        value="<?php echo isset($_SESSION['SoDienThoai']) ? $_SESSION['SoDienThoai'] : '' ?>">
                                </label>
                                <button name="teacherAdd" type="submit">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="event-right">
                    <!-- Search -->
                    <form action="?" method="get">
                        <div class="search-form">
                            <input type="hidden" name="page" value="teacher">
                            <input type="text" placeholder="Tên giảng viên..." name="teacherSearch" required>
                            <button type="submit">Tra cứu</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End -->

        <!-- Table -->
        <table id="table-majors">
            <!-- Heading table -->
            <thead id="table-head">
                <tr class="row-h">
                    <th class="col-h">Mã Khoa</th>
                    <th class="col-h">Mã giảng viên</th>
                    <th class="col-h">Tên giảng viên</th>
                    <th class="col-h">Email</th>
                    <th class="col-h">Số điện thoại</th>
                    <th class="col-h">Sửa</th>
                    <th class="col-h">Xóa</th>
                </tr>
            </thead>
            <!-- End -->

            <!-- Body table -->
            <tbody id="table-body">
                <!-- CÂU REQUIRE LÀ ĐỂ IMPORT FILE SEARCH VỚI HIỂN THỊ BÊN FOLDER COMPONENTS -->
                <?php require "app/components/teacher_search_render.php"; ?>

                <!-- NÀY LÀ POP UP CẬP NHẬT LẠI THÔNG TIN -->
                <!-- ĐỔI MẤY CÁI NÀY LẠI ĐỂ LÀM BÊN FILE UPDATE JAVASCRIPT -->
                <!-- 
                    MẤY CÁI NÀO CÓ CHỮ ep -> student (student.php), teacher (teacher.php), subjec (subject.php)
                    
                    VÍ DỤ:
                    epMyModal -> studentMyModal (student.php), teacherMyModal (teacher.php), subjectMyModal (subject.php)
                    epOldID -> studentOldID (student.php), teacherOldID (teacher.php), subjectOldID (subject.php)
                    epFormselectOption -> studentFormselectOption (student.php), teacherFormselectOption (teacher.php), subjectFormselectOption (subject.php)
                    ...
                    ...
                    ...
                 -->
                <div id="epMyModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <img src="public/imgs/logo.png" alt="logo">
                        <form action="?page=ep" method="post">
                            <input type="hidden" name="epOldID" id="epOldID">
                            <label>
                                <span>Mã khoa:</span>
                                <select class="select_style" id="epFormselectOption" name="epNewselectOption">
                                    <?php
                                        // $result = Faculty($conn); // Gọi hàm Faculty() và lưu kết quả trả về vào biến $result
                                        // if ($result->num_rows > 0) {
                                        //     while($row = $result->fetch_assoc()) {
                                        //         echo '<option value="' . $row["KhoaID"] . '">' . $row["KhoaID"] . '</option>';
                                        //     }
                                        // }
                                    ?>
                                </select>
                            </label>
                            <br>
                            <label>
                                <span>Mã chương trình đào tạo:</span>
                                <input type="text" id="epFormID" name="epNewID" required>
                            </label>
                            <br>
                            <label>
                                <span>Tên chương trình đào tạo:</span>
                                <input type="text" id="epFormName" name="epNewName" required>
                            </label>
                            <br>
                            <button name="EPUpdate" type="submit">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </tbody>
            <!-- End -->
        </table>
        <!-- End -->
    </div>
</section>
<script src="public/js/teacher_update.js"></script>
<script src="public/js/teacher_add.js"></script>