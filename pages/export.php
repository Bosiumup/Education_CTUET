<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$dsn = 'mysql:host=localhost;dbname=qlctdt';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Kết nối đến cơ sở dữ liệu thất bại: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra xem có giá trị CTĐT được chọn không
    if (isset($_POST['ctdt'])) {
        $selectedMaCTDT = $_POST['ctdt'];

        $query = $pdo->prepare("SELECT ctdt.*, mon_hoc.*, chitiet.*
                               FROM ctdt, mon_hoc, chitiet
                               WHERE ctdt.ma_ctdt = chitiet.ma_ctdt
                               AND mon_hoc.ma_mon_hoc = chitiet.ma_mon_hoc
                               AND ctdt.ma_ctdt = :selectedMaCTDT");

        $query->bindParam(':selectedMaCTDT', $selectedMaCTDT);

        try {
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error executing query: ' . $e->getMessage());
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Mã CTĐT');
        $sheet->setCellValue('B1', 'Tên CTĐT');
        $sheet->setCellValue('C1', 'Mã học phần');
        $sheet->setCellValue('D1', 'Tên học phần');
        $sheet->setCellValue('E1', 'Học kì');
        $sheet->setCellValue('F1', 'Số tín chỉ');
        $sheet->setCellValue('G1', 'Số tiết lý thuyết');
        $sheet->setCellValue('H1', 'Số tiết thực hành');

        $row = 2;
        foreach ($data as $record) {
            $sheet->setCellValue('A' . $row, $record['ma_ctdt']);
            $sheet->setCellValue('B' . $row, $record['ten_ctdt']);
            $sheet->setCellValue('C' . $row, $record['ma_mon_hoc']);
            $sheet->setCellValue('D' . $row, $record['ten_mon_hoc']);
            $sheet->setCellValue('E' . $row, $record['hoc_ki']);
            $sheet->setCellValue('F' . $row, $record['so_tin_chi']);
            $sheet->setCellValue('G' . $row, $record['so_tiet_ly_thuyet']);
            $sheet->setCellValue('H' . $row, $record['so_tiet_thuc_hanh']);
            $row++;
        }

        $excelFileName = 'downloads/export_ctdt.xlsx';

        $writer = new Xlsx($spreadsheet);
        $writer->save($excelFileName);

        header('Location: ' . $excelFileName);
        exit;
    } else {
        echo 'Vui lòng chọn CTĐT.';
    }
}