<?php 
    if (isset($_GET['KhoaID'])) {
        $khoaID = $_GET['KhoaID']; 
    }
?>
<div class="main-register">
    <a href="?page=ep&KhoaID=<?php echo $khoaID ?>">Chương trình đào tạo</a>
    <a href="?page=teacher&KhoaID=<?php echo $khoaID ?>">Giảng viên</a>
</div>
<style>
.main-register {
    height: 632px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.main-register a {
    font-size: xx-large;
    padding: 20px;
    border: 1px solid var(--primary-color);
    margin-right: 20px;
    border-radius: 10px;
    transition: all 0.1s linear;
}

.main-register a:hover {
    transform: scale(1.05);
    filter: blur(1px);
}
</style>