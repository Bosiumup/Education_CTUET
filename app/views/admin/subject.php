<?php
    require "app/controllers/subject_controller.php";
    $subjectController = new SJ_Controller();
    $subjectController->add();              
    $subjectController->update(); 
    $subjectController->delete();
    // $epController->search();

?>
<section class="container-students">
    <div class="grid wide majors-full">
        <!-- Events -->
        <section class="events">
            <div class="events-list">
                <div class="event-left">
                    <!-- Add EP -->
                    <form action="?page=subject" method="POST">
                        <input type="text" name="SjID" placeholder="Mã Môn..." required
                            value="">
                        <input type="text" name="Sjname" placeholder="Tên Môn..." required
                            value="">
                        <input type="text" name="Sjterm" placeholder="Học kỳ..-" required
                            value="">
                        <input type="text" name="Sjcredit" placeholder="Số tín chỉ..." required
                            value="">
                        <input type="text" name="Sjlythuyet" placeholder="Tiết lý thuyết..." required
                            value="">
                        <input type="text" name="Sjthuchanh" placeholder="Tiết thực hành..." required
                            value="">
                        <select name="SjselectOption">
                            <?php
                            $result = EP($conn); // Gọi hàm Faculty() và lưu kết quả trả về vào biến $result
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["CTDaoTaoID"] . '">' . $row["CTDaoTaoID"] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <button name="SJAdd" type="submit">Thêm</button>
                    </form>
                </div>

                <div class="event-right">
                    <!-- Search -->
                    <form action="?" method="get">
                        <div class="search-form">
                            <input type="hidden" name="page" value="subject">
                            <input type="text" placeholder="Tên chương trình..." name="SJNameSearch" required>
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
                    <th class="col-h">Mã Môn</th>
                    <th class="col-h">Mã chương trình đào tạo</th>
                    <th class="col-h">Tên môn</th>
                    <th class="col-h">Học Kỳ</th>
                    <th class="col-h">Tín chỉ</th>
                    <th class="col-h">Tiết lý thuyết</th>
                    <th class="col-h">Tiết thực hành</th>
                    <th class="col-h">Sửa</th>
                    <th class="col-h">Xóa</th>

                </tr>
            </thead>
            <!-- End -->

            <!-- Body table -->
            <tbody id="table-body">
                <!-- CÂU REQUIRE LÀ ĐỂ IMPORT FILE SEARCH VỚI HIỂN THỊ BÊN FOLDER COMPONENTS -->
                <?php require "app/components/subject_search_render.php"; ?>

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
                <div id="SJMyModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <img src="public/imgs/logo.png" alt="logo">
                        <form action="?page=subject" method="post">
                            <input type="hidden" name="SJOldID" id="SJOldID">
                            <label>
                                <span>Mã chương trình đào tạo:</span>
                                <select class="select_style" id="SJFormselectOption" name="SJNewselectOption">
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
                                <span>Mã môn:</span>
                                <input type="text" id="SJFormID" name="SJNewID" required>
                            </label>
                            <br>
                            <label>
                                <span>Tên môn:</span>
                                <input type="text" id="SJFormName" name="SJNewName" required>
                            </label>
                            <label>
                                <span>Học kỳ:</span>
                                <input type="text" id="SJFormHocKy" name="SJNewHocKy" required>
                            </label>
                            <label>
                                <span>TÍn chỉ:</span>
                                <input type="text" id="SJFormTinChi" name="SJNewTinChi" required>
                            </label>
                            <label>
                                <span>Tiết lý thuyết:</span>
                                <input type="text" id="SJFormLyThuyet" name="SJNewLyThuyet" required>
                            </label>
                            <label>
                                <span>Thực hành:</span>
                                <input type="text" id="SJFormThucHanh" name="SJNewThucHanh" required>
                            </label>

                            <br>
                            <button name="SJUpdate" type="submit">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </tbody>
            <!-- End -->
        </table>
        <!-- End -->
    </div>
</section>
<style>
    .container-students input[type="text"],
    .container-students select {
        font-size: 12px;
    }

    .container-students .event-left form {
        display: flex;
        flex-wrap: wrap;
        width: 800px;
        gap: 10px;
    }
    .container-students .event-left{
        height: 70px;
    }
</style>

<script src="public/js/subject_update.js"></script>