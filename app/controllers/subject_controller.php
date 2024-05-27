<?php    
    class SJ_Controller {
        public function add() {
            global $conn;
            if(isset($_POST['SJAdd'])){
                $prefix = "CTUT";
                $random_number = mt_rand(1000, 9999);
                $SJID = $prefix . $random_number;
                $SJNAME = $_POST['Sjname'];
                $SJTERM = $_POST['Sjterm'];
                $SJTinChi = $_POST['Sjcredit'];
                $SJLyThuyet = $_POST['Sjlythuyet'];
                $SJThucHanh = $_POST['Sjthuchanh'];
                $SJselectOption = $_POST['SjselectOption'];

                require "app/models/subject_model.php";
                $SubjectModel = new SJ_Model();
                if ($SubjectModel->checkAdd($conn, $SJNAME)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Khoa $SJNAME đã có',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=subject';
                            }, 1500);
                            </script>";    
                } 
                else {
                    $SubjectModel->add($conn, $SJID, $SJselectOption, $SJNAME,$SJTERM,$SJTinChi,$SJLyThuyet,$SJThucHanh);
                    if($SubjectModel) {
                        echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Thêm thành công',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });
                            
                            setTimeout(function() {
                                window.location.href='?page=subject';
                            }, 1500);
                            </script>";
                    } 
                }
            }
        }
        public function update() {
            global $conn;
            if (isset($_POST['SJUpdate'])) {
                $SJID = $_POST['SJNewID'];
                $SJOldID = $_POST['SJOldID'];
                $SJNAME = $_POST['SJNewName'];
                $SJTERM = $_POST['SJNewHocKy'];
                $SJTinChi = $_POST['SJNewTinChi'];
                $SJLyThuyet = $_POST['SJNewLyThuyet'];
                $SJThucHanh = $_POST['SJNewThucHanh'];
                $SJselectOption = $_POST['SJNewselectOption'];

                require "app/models/subject_model.php";
                $SJModel = new SJ_Model();
                
                    $SJModel->update($conn, $SJID,$SJOldID, $SJselectOption, $SJNAME,$SJTERM,$SJTinChi,$SJLyThuyet,$SJThucHanh);
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Cập nhật thành công',
                                showConfirmButton: false,
                                timer: 2000,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=subject';
                            }, 1500);
                            </script>";    
                
            }
        }
        public function delete() {
            global $conn;
            if (isset($_POST['SJDelete'])) {
                $SJID = $_POST['SJID'];
                require "app/models/subject_model.php";
                $SJModel = new SJ_Model();
                $SJModel->delete($conn, $SJID);
                echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Xóa thành công',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=subject';
                            }, 1500);
                        </script>";
            }
        }
    }
?>