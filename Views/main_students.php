<section class="container-students">
    <h1 class="heading-main-shared">Sinh Viên CTUET</h1>
    <div class="grid wide majors-full">
        <!-- Events -->
        <section class="events">
            <div class="events-list">
                <div class="event-left">
                    <!-- Add student -->
                    <form action="index.php" method="post">
                        <div class="add_student">
                            <button class="btn_student" type="button" name="addBtn">Thêm sinh viên</button>
                        </div>
                    </form>
                </div>

                <div class="event-right">
                    <!-- Search -->
                    <form action="index.php" method="post">
                        <div class="search-form">
                            <input type="text" placeholder="Sinh viên..." name="search_student">
                            <button type="button">Tra cứu</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End -->

        <!-- Table majors -->
        <table id="table-majors">
            <!-- Heading table -->
            <thead id="table-head">
                <tr class="row-h">
                    <th class="col-h">Lớp</th>
                    <th class="col-h">Mã sinh viên</th>
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
                    <td class="col-d"><?php $row['class'] ?></td>
                    <td class="col-d"><?php $row['student_code'] ?></td>
                    <td class="col-d"><?php $row['name'] ?></td>
                    <td class="col-d">
                        <button type="button" class="deleteBtn">
                            <i class="fa-solid fa-update"></i>
                        </button>
                    </td>
                    <td class="col-d">
                        <button type="button" class="deleteBtn">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php
                    }
                }
                    ?>
            </tbody>
            <!-- End -->
        </table>
        <!-- End -->
    </div>
</section>