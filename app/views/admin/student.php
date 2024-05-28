<?php
    require "app/controllers/student_controller.php";
    $studentController = new Student_Controller();
    $studentController->add();              
    $studentController->update(); 
    $studentController->delete();
    // $StudentController->search();

?>

<section class="container-students">
    <div class="grid wide majors-full">
        <!-- Events -->
        <section class="events">
            <div class="events-list">
                <div class="event-left">
                    <!-- Add Student -->
                    <button id="SdOpenFormAdd" type="button">Thêm</button>
                    <div id="SdMyModalAdd" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <img src="public/imgs/logo.png" alt="logo">
                            <form style="width: 100%; display: inline-block;" action="?page=student" method="POST">
                                <label>
                                    <select name="StudentselectOption">
                                        <?php
                                $result = EP($conn); // Gọi hàm Student() và lưu kết quả trả về vào biến $result
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["CTDaoTaoID"] . '">' . $row["CTDaoTaoID"] . '</option>';
                                    }
                                }
                            ?>
                                    </select>
                                </label>
                                <label>
                                    <input type="text" name="StudentName" placeholder="Tên sinh viên" required
                                        value="<?php echo isset($_SESSION['StudentName']) ? $_SESSION['StudentName'] : '' ?>">
                                </label>
                                <label>
                                    <input type="text" name="Email" placeholder="Email" required
                                        value="<?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : '' ?>">
                                </label>
                                <label>
                                    <input type="text" name="SoDienThoai" placeholder="Số Điện Thoại" required
                                        value="<?php echo isset($_SESSION['SDT']) ? $_SESSION['SDT'] : '' ?>">
                                </label>
                                <button name="studentAdd" type="submit">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="event-right">
                    <!-- Search -->
                    <form action="?" method="get">
                        <div class="search-form">
                            <input type="hidden" name="page" value="student">
                            <input type="text" placeholder="Tên sinh viên..." name="StudentNameSearch" required>
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
                    <th class="col-h">Mã chương trình đào tạo</th>
                    <th class="col-h">Mã sinh viên</th>
                    <th class="col-h">Tên sinh viên</th>
                    <th class="col-h">Email</th>
                    <th class="col-h">Số điện thoại</th>
                    <th class="col-h">Sửa</th>
                    <th class="col-h">Xóa</th>
                </tr>
            </thead>
            <!-- End -->

            <!-- Body table -->
            <tbody id="table-body">
                <?php require "app/components/student_search_render.php"; ?>
                <div id="sdMyModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <img src="public/imgs/logo.png" alt="logo">
                        <form action="?page=student" method="post">
                            <input type="hidden" name="sdOldID" id="sdOldID">
                            <label>
                                <span>Mã chương trình đào tạo:</span>
                                <select class="select_style" id="sdFormselectOption" name="sdNewselectOption">
                                    <?php
                                    $result = EP($conn); 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row["CTDaoTaoID"] . '">' . $row["CTDaoTaoID"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </label>
                            <br>
                            <label>
                                <span>Tên sinh viên:</span>
                                <input type="text" id="sdFormName" name="sdNewName" required>
                            </label>
                            <br>
                            <label>
                                <span>Email:</span>
                                <input type="text" id="sdFormEmail" name="sdNewEmail" required>
                            </label>
                            <br>
                            <label>
                                <span>Số điện thoại:</span>
                                <input type="text" id="sdFormPhone" name="sdNewPhone" required>
                            </label>
                            <br>
                            <button name="SDUpdate" type="submit">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </tbody>
            <!-- End -->
        </table>
        <!-- End -->
    </div>
</section>
<script src="public/js/student_update.js"></script>
<script src="public/js/student_add.js"></script>