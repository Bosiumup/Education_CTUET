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
                    <!-- Add student -->
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
                                        echo '<option value="' . $row["KhoaID"] . '">' . $row["TenKhoa"] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                        <button name="EPAdd" type="submit">Thêm</button>
                    </form>
                </div>

                <div class="event-right">
                    <!-- Search -->
                    <form action="?page=ep" method="post">
                        <div class="search-form">
                            <input type="text" placeholder="Tên chương trình..." name="facultyNameSearch" required>
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
                    <th class="col-h">Mã chương trình đào tạo</th>
                    <th class="col-h">Tên chương trình đào tạo</th>
                    <th class="col-h">Sửa</th>
                    <th class="col-h">Xóa</th>
                </tr>
            </thead>
            <!-- End -->

            <!-- Body table -->
            <tbody id="table-body">
                <?php
                    if (isset($_GET['KhoaID'])) {
                        $khoaID = $_GET['KhoaID'];
                        $result = EP_KhoaID($conn, $khoaID); // Gọi hàm EP_KhoaID() nếu có mã khoa được nhận
                    } else {
                        $result = EP($conn); // Gọi hàm EP() nếu không có mã khoa được nhận
                    }
                    if ($result->num_rows > 0) {  
                        while ($row = $result->fetch_assoc()) {
                        ?>
                <tr class="row-d">
                    <td class="col-d"><?php echo $row['KhoaID'] ?></td>
                    <td class="col-d"><?php echo $row['CTDaoTaoID'] ?></td>
                    <td class="col-d"><?php echo $row['TenChuongTrinh'] ?></td>
                    <td class="col-d">
                        <!-- Button open modal update -->
                        <input class="epPresentKhoaID" type="hidden" value="<?php echo $row['KhoaID'] ?>">
                        <input class="epPresentID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
                        <input class="epPresentName" type="hidden" value="<?php echo $row['TenChuongTrinh'] ?>">
                        <button class="EPOpenFormUpdate updateBtn" type="button">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td class="col-d">
                        <!-- Delete -->
                        <form action="?page=ep" method="post">
                            <input name="EPID" type="hidden" value="<?php echo $row['CTDaoTaoID'] ?>">
                            <button name="EPDelete" type="submit" class="deleteBtn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                    ?>
                <div id="epMyModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <img src="public/imgs/logo.png" alt="logo">
                        <form action="?page=ep" method="post">
                            <input type="hidden" name="epOldID" id="epOldID">
                            <label>
                                <span>Mã chương trình đào tạo:</span>
                                <input class="readonly" type="text" id="epFormID" name="epNewID" required>
                            </label>
                            <br>
                            <label>
                                <span>Tên chương trình đào tạo:</span>
                                <input type="text" id="epFormName" name="epNewName" placeholder="Tên khoa..." required>
                            </label>
                            <br>
                            <label>
                                <span>Mã khoa:</span>
                                <select id="epFormselectOption" name="epNewselectOption">
                                    <?php
                                        $result = Faculty($conn); // Gọi hàm Faculty() và lưu kết quả trả về vào biến $result
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["KhoaID"] . '">' . $row["TenKhoa"] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </label>
                            <br>
                            <button name="EPUpdate" type="submit">Cập nhật</button>
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
<script src="public/js/ep/update.js"></script>