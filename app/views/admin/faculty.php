<?php
    require "app/controllers/faculty_controller.php";
    $facultyController = new Faculty_Controller();
    $facultyController->add();              
    $facultyController->update(); 
    $facultyController->delete();
    // $facultyController->search();

?>

<section class="container-students">
    <div class="grid wide majors-full">
        <!-- Events -->
        <section class="events">
            <div class="events-list">
                <div class="event-left">
                    <!-- Add student -->
                    <form action="?page=faculty" method="POST">
                        <input type="text" name="facultyID" placeholder="Mã khoa..." required
                            value="<?php echo isset($_SESSION['facultyID']) ? $_SESSION['facultyID'] : '' ?>">
                        <input type="text" name="facultyName" placeholder="Tên khoa..." required
                            value="<?php echo isset($_SESSION['facultyName']) ? $_SESSION['facultyName'] : '' ?>">
                        <button name="facultyAdd" type="submit">Thêm</button>
                    </form>
                </div>

                <div class="event-right">
                    <!-- Search -->
                    <form action="?page=faculty" method="post">
                        <div class="search-form">
                            <input type="text" placeholder="Tên khoa..." name="facultyNameSearch" required>
                            <button name="facultySearch" type="submit">Tra cứu</button>
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
                    <th class="col-h">Mã khoa</th>
                    <th class="col-h">Tên khoa</th>
                    <th class="col-h">Sửa</th>
                    <th class="col-h">Xóa</th>
                </tr>
            </thead>
            <!-- End -->

            <!-- Body table -->
            <tbody id="table-body">
                <?php
                    $result = Faculty($conn);
                    if ($result->num_rows > 0) {  
                        while ($row = $result->fetch_assoc()) {
                        ?>
                <tr class="row-d">
                    <td class="col-d">
                        <a href="?page=ep&KhoaID=<?php echo $row['KhoaID'] ?>">
                            <?php echo $row['KhoaID'] ?>
                        </a>
                    </td>
                    <td class="col-d">
                        <a href="?page=ep&KhoaID=<?php echo $row['KhoaID'] ?>">
                            <?php echo $row['TenKhoa'] ?>
                        </a>
                    </td>
                    <td class="col-d">
                        <!-- Button open modal update -->
                        <input class="facultyPresentID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
                        <input class="facultyPresentName" type="hidden" value="<?php echo $row['TenKhoa'] ?>">
                        <button class="facultyOpenFormUpdate updateBtn" type="button">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td class="col-d">
                        <!-- Delete -->
                        <form action="?page=faculty" method="post">
                            <input name="facultyID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
                            <button name="facultyDelete" type="submit" class="deleteBtn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                    ?>
                <div id="facultyMyModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <img src="public/imgs/logo.png" alt="logo">
                        <form action="?page=faculty" method="post">
                            <input type="hidden" name="facultyOldID" id="facultyOldID">
                            <label>
                                <span>Mã khoa:</span>
                                <input class="readonly" type="text" id="facultyFormID" readonly>
                            </label>
                            <br>
                            <label>
                                <span>Tên khoa:</span>
                                <input type="text" id="facultyFormName" name="facultyNewName" placeholder="Tên khoa..."
                                    required>
                            </label>
                            <br>
                            <button name="facultyUpdate" type="submit">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <?php
                }
                    ?>
            </tbody>
            <!-- End -->
        </table>
        <!-- End -->
    </div>
</section>
<script src="public/js/facultys/update.js"></script>