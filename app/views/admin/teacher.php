<?php 
    require "app/controllers/teacher_controller.php";
    $studentController = new StudentController();
    $studentController->add();
    $studentController->delete();
    $studentController->update();
?>

<section class="container-students">
    <h1 class="heading-main-shared">Giảng viên CTUET</h1>
    <div class="grid wide majors-full">
        <!-- Events -->
        <section class="events">
            <div class="events-list">
                <div class="event-left">
                    <!-- Add student -->
                    <form id="add-student-form" action="" method="POST">
                        <input type="text" id="class" name="class" placeholder="Khoa..."
                            value="<?php echo isset($_SESSION['ss_class']) ? $_SESSION['ss_class'] : '' ?>">
                        <input type="text" id="student_code" name="student_code" placeholder="Mã giảng viên..."
                            value="<?php echo isset($_SESSION['ss_student_code']) ? $_SESSION['ss_student_code'] : '' ?>">
                        <input type="text" id="name" name="name" placeholder="Tên..."
                            value="<?php echo isset($_SESSION['ss_name']) ? $_SESSION['ss_name'] : '' ?>">
                        <button class="btn_student" name="btn_add" type="submit">Thêm giảng viên</button>
                        <?php 
                            require "teachers/add.php"
                        ?>
                    </form>
                </div>

                <div class="event-right">
                    <!-- Search -->
                    <form action="" method="post">
                        <div class="search-form">
                            <input type="text" placeholder="Giảng viên..." name="search_student">
                            <button type="button">Tra cứu</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End -->

        <!-- Table majors -->
        <form action="" method="post">
            <table id="table-majors">
                <!-- Heading table -->
                <thead id="table-head">
                    <tr class="row-h">
                        <th class="col-h">Khoa</th>
                        <th class="col-h">Mã giảng viên</th>
                        <th class="col-h">Tên</th>
                        <th class="col-h">Sửa</th>
                        <th class="col-h">Xóa</th>
                    </tr>
                </thead>
                <!-- End -->

                <!-- Body table -->
                <tbody id="table-body">
                    <?php 
                    $result = Students($conn);
                    if ($result->num_rows > 0) {  
                        while ($row = $result->fetch_assoc()) {
                        ?>
                    <tr class="row-d">
                        <td class="col-d"><?php echo $row['class'] ?></td>
                        <td class="col-d"><?php echo $row['student_code'] ?></td>
                        <td class="col-d"><?php echo $row['name'] ?></td>
                        <td class="col-d">
                            <?php 
                                require "teachers/update.php";
                            ?>
                            <input type="hidden" class="class" value="<?php echo $row['class'] ?>">
                            <input type="hidden" class="student_code" value="<?php echo $row['student_code'] ?>">
                            <input type="hidden" class="name" value="<?php echo $row['name'] ?>">
                            <button class="update-student-form deleteBtn" type="button" name="btn_update">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </td>
                        <td class="col-d">
                            <?php 
                                require "teachers/delete.php";
                            ?>
                            <input type="hidden" name="student_code" id="student_code"
                                value="<?php echo $row['student_code'] ?>">
                            <input type="hidden" name="name" value="<?php echo $row['name'] ?>">
                            <button id="delete-student-form" type="submit" class="deleteBtn" name="btn_delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <form action="" id="editForm">
                                <input type="hidden" name="old_student_code" id="old_student_code">
                                <label>
                                    <span style="margin-left: 26px;">Khoa:</span>
                                    <input type="text" id="edit_class" name="new_class" placeholder="Khoa...">
                                </label>
                                <br>
                                <label>
                                    <span>Mã giảng viên:</span>
                                    <input type="text" id="edit_student_code" readonly>
                                </label>
                                <br>
                                <label>
                                    <span>Tên:</span>
                                    <input type="text" id="edit_name" name="new_name" placeholder="Tên...">
                                </label>
                                <br>
                                <button name="btn_update" type="submit">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                    <?php
                }
                    ?>
                </tbody>
                <!-- End -->
            </table>
        </form>
        <!-- End -->
    </div>
</section>