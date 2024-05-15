<?php    
    class Faculty_Controller {
        public function add() {
            global $conn;
            if(isset($_POST['facultyAdd'])){
                $facultyID = $_POST['facultyID'];
                $facultyName = $_POST['facultyName'];

                $_SESSION['facultyID'] = $_POST['facultyID'];
                $_SESSION['facultyName'] = $_POST['facultyName'];

                require "app/models/faculty_model.php";
                $facultyModel = new Faculty_Model();
                if ($facultyModel->checkAdd($conn, $facultyID, $facultyName)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Mã khoa $facultyID hoặc khoa $facultyName đã có',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=faculty';
                            }, 1500);
                            </script>";    
                } 
                else {
                    $facultyModel->add($conn, $facultyID, $facultyName);
                    if($facultyModel) {
                        unset($_SESSION['facultyID']);
                        unset($_SESSION['facultyName']);
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
                                window.location.href='?page=faculty';
                            }, 1500);
                            </script>";
                    } 
                }
            }
        }
        public function update() {
            global $conn;
            if (isset($_POST['facultyUpdate'])) {
                $facultyOldID = $_POST['facultyOldID'];
                $facultyNewName = $_POST['facultyNewName'];

                require "app/models/faculty_model.php";
                $facultyModel = new Faculty_Model();
                if ($facultyModel->checkUpdate($conn, $facultyNewName)->num_rows > 0) {
                    echo "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Khoa $facultyNewName đã có',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    title: 'custom-alert-title'
                                }
                            });

                            setTimeout(function() {
                                window.location.href='?page=faculty';
                            }, 1500);
                            </script>";    
                } 
                else {
                    $facultyModel->update($conn, $facultyNewName, $facultyOldID);
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
                                window.location.href='?page=faculty';
                            }, 1500);
                            </script>";    
                }
            }
        }
        public function delete() {
            global $conn;
            if (isset($_POST['facultyDelete'])) {
                $facultyID = $_POST['facultyID'];
                $facultyName = $_POST['facultyName'];
                
                require "app/models/faculty_model.php";
                $facultyModel = new Faculty_Model();
                $facultyModel->delete($conn, $facultyID);
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
                                window.location.href='?page=faculty';
                            }, 1500);
                        </script>";
            }
        }
    }
?>