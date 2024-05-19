<?php
    require "app/controllers/ep_controller.php";
    $epController = new EP_Controller();
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
                    <form action="?page=ep" method="POST">
                        <input type="text" name="EPID" placeholder="Mã chương trình..." required
                            value="<?php echo isset($_SESSION['EPID']) ? $_SESSION['EPID'] : '' ?>">
                        <input type="text" name="EPName" placeholder="Tên chương trình..." required
                            value="<?php echo isset($_SESSION['EPName']) ? $_SESSION['EPName'] : '' ?>">
                        <select name="EPselectOption">
                            <?php
                                $result = Faculty($conn); // Gọi hàm Faculty() và lưu kết quả trả về vào biến $result
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["KhoaID"] . '">' . $row["KhoaID"] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                        <button name="EPAdd" type="submit">Thêm</button>
                    </form>
                </div>

                <div class="event-right">
                    <!-- Search -->
                    <form action="?" method="get">
                        <div class="search-form">
                            <input type="hidden" name="page" value="ep">
                            <input type="text" placeholder="Tên chương trình..." name="epNameSearch" required>
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
                    <th class="col-h">Mã khoa</th>
                    <th class="col-h">Mã chương trình đào tạo</th>
                    <th class="col-h">Tên chương trình đào tạo</th>
                    <th class="col-h">Sửa</th>
                    <th class="col-h">Xóa</th>
                </tr>
            </thead>
            <!-- End -->

            <!-- Body table -->
            <tbody id="table-body">
                <!-- CÂU REQUIRE LÀ ĐỂ IMPORT FILE SEARCH VỚI HIỂN THỊ BÊN FOLDER COMPONENTS -->
                <?php require "app/components/ep_search_render.php"; ?>

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
                                        $result = Faculty($conn); // Gọi hàm Faculty() và lưu kết quả trả về vào biến $result
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["KhoaID"] . '">' . $row["KhoaID"] . '</option>';
                                            }
                                        }
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
<script src="public/js/ep_update.js"></script>