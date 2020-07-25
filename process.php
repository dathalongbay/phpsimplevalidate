<?php
session_start();

// gán biến cờ check dữ liệu mặc định là hợp lệ
$checkValid = true;
// tạo biến $errors chứa thông báo lỗi
$errors = [];

if (!isset($_POST['name']) || empty($_POST['name'])) {
    $checkValid = false;
    $errors["name"] = "tên không hợp lệ";
}
if (!isset($_POST['email']) || empty($_POST['email'])) {
    $checkValid = false;
    $errors["email"] = "email không hợp lệ";
}
if (!isset($_POST['gender']) || empty($_POST['gender'])) {
    $checkValid = false;
    $errors["gender"] = "gender không hợp lệ";
}

// nếu biến check lỗi là false
// thì chuyển hướng về index5.php
if (!$checkValid) {
    // lưu biến lỗi vào session để khi quay lại file index5 thì in ra
    $_SESSION['errors'] = $errors;
    $_SESSION['old_data'] = $_POST;

    header("location: index.php");
    exit();
}


$dataValid = [];
$dataValid['name'] = isset($_POST['name']) ? isset($_POST['name']) : "";
$dataValid['email'] = isset($_POST['email']) ? isset($_POST['email']) : "";
$dataValid['website'] = isset($_POST['website']) ? isset($_POST['website']) : "";
$dataValid['comment'] = isset($_POST['comment']) ? isset($_POST['comment']) : "";
$dataValid['gender'] = isset($_POST['gender']) ? isset($_POST['gender']) : "";

// validate hợp lệ
$_SESSION["info"] = $dataValid;

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
echo "<br> thành công ";
