<section class="container-education">
    <h1 class="heading-main-shared">QUẢN LÝ KHOA</h1>
    <div style="max-width: 1200px" class="grid wide majors-full">
        <!-- Events -->
        <section class="events">
            <div class="events-list">
                <div class="event-left">
                    <!-- Export -->
                    <div class="export">
                        <form action="index.php?page=export.php" method="post" target="_blank">
                            <div class="export-output">
                                <div class="education-program_list">
                                    <select name="ctdt" id="dsctdt">
                                        <?php
                                        $result_dsctdt = ctdt($conn);
                                        while ($row = $result_dsctdt->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row["ma_ctdt"] ?>"><?php echo $row["ten_ctdt"] ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit">
                                    <i style="margin-right: 6px;" class="fa-solid fa-file-export"></i>XUẤT KHOA
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- ADD CTDT -->
                    <div class="add_ctdt">
                        <button style="margin-left: 0" class="addCtdt" type="submit" name="addBtn">THÊM KHOA</button>
                    </div>


                </div>

                <div class="event-right">
                    <!-- Search -->
                    <form action="<?php echo "index.php?page=khoa.php" ?>" method="post">
                        <div class="search-form">
                            <input type="text" placeholder="Nhập tên Khoa" name="ctdt_search">
                            <button type="submit">Tra cứu</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End -->

        <!-- Table majors -->
        <section style="border-top-left-radius: 10px; border-top-right-radius: 10px; overflow: hidden;">
            <table id="table-majors">
                <!-- Heading table -->
                <thead id="table-head">
                    <tr class="row-h">
                        <th class="col-h w-25">Mã Khoa</th>
                        <th class="col-h w-50">Tên Khoa</th>
                        <th class="col-h w-10">Sửa</th>
                        <th class="col-h w-10">Xóa</th>
                    </tr>
                </thead>
                <!-- End -->

                <!-- Body table -->
                <tbody id="table-body">
                    <?php
                    require "tableKhoa.php";
                    ?>
                </tbody>
                <!-- End -->
            </table>
        </section>
        <!-- End -->

        <!-- events button -->
        <!-- <form style="display: flex; justify-content: center;" action="index.php" method="post">
        <div class="option-cart" style="justify-content: center; margin-top: 30px;">
            <button class="btn-cart fz-17" type="submit" name='delete_all_ctdt'>
                <span>Xóa tất cả CTDT</span>
            </button>
        </div>
        <div class="option-cart" style="justify-content: center; margin-top: 30px;">
            <button class="btn-cart fz-17" type="submit" name='delete_all_hp'>
                <span>Xóa tất cả môn học</span>
            </button>
        </div>
    </form> -->

        <?php
        // if (isset($_POST["delete_all_ctdt"])) {
        //     deleteAllctdt($conn);
        //     echo "<script>
        //            alert('Xóa tất cả ctdt thành công!');
        //            window.location.href='index.php';
        //            </script>";
        // }

        // if (isset($_POST["delete_all_hp"])) {
        //     deleteAllhp($conn);
        //     echo "<script>
        //            alert('Xóa tất cả học phần thành công!');
        //            window.location.href='index.php';
        //            </script>";
        // }
        ?>

    </div>
</section>