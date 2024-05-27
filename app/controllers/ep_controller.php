<?php    
    class EP_Controller {
        public function add() {
            global $conn;
            if(isset($_POST['EPAdd'])){
                $EPID = $_POST['EPID'];
                $EPName = $_POST['EPName'];
                $EPselectOption = $_POST['EPselectOption'];

                $_SESSION['EPID'] = $_POST['EPID'];
                $_SESSION['EPName'] = $_POST['EPName'];

                require "app/models/ep_model.php";
                $epModel = new EP_Model();
                if ($epModel->checkAdd($conn, $EPID, $EPName)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Mã khoa $EPID hoặc khoa $EPName đã có',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=ep';
                            }, 1500);
                            </script>";    
                } 
                else {
                    $epModel->add($conn, $EPID, $EPselectOption, $EPName);
                    if($epModel) {
                        unset($_SESSION['EPID']);
                        unset($_SESSION['EPName']);
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
                                window.location.href='?page=ep';
                            }, 1500);
                            </script>";
                    } 
                }
            }
        }
        public function update() {
            global $conn;
            if (isset($_POST['EPUpdate'])) {
                $epOldID = $_POST['epOldID'];
                $epNewID = $_POST['epNewID'];
                $epNewName = $_POST['epNewName'];
                $epNewselectOption = $_POST['epNewselectOption'];

                require "app/models/ep_model.php";
                $epModel = new EP_Model();
                if ($epModel->checkUpdate($conn, $epOldID, $epNewName)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Chương trình đào tạo $epNewName đã có',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=ep';
                            }, 1500);
                            </script>";    
                } 
                else {
                    $epModel->update($conn, $epNewID, $epNewselectOption, $epNewName, $epOldID);
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
                                window.location.href='?page=ep';
                            }, 1500);
                            </script>";    
                }
            }
        }
        public function delete() {
            global $conn;
            if (isset($_POST['EPDelete'])) {
                $EPID = $_POST['EPID'];
                
                require "app/models/ep_model.php";
                $epModel = new EP_Model();
                $epModel->delete($conn, $EPID);
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
                                window.location.href='?page=ep';
                            }, 1500);
                        </script>";
            }
        }
    }
?>