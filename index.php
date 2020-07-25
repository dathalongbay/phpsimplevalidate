<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>
<body>

    <?php
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    $errors = isset($_SESSION["errors"]) ? $_SESSION["errors"] : [];
    $old_data = isset($_SESSION["old_data"]) ? $_SESSION["old_data"] : [];
    ?>

    <h1>Form thông tin</h1>

    <div>
        <form method="post" action="process.php">
            Name: <input type="text" name="name" value="<?php echo isset($old_data["name"]) ? $old_data["name"] : "" ?>">
            <span class="error">* <?php echo isset($errors["name"]) ? $errors["name"] : "" ?></span>
            <br><br>
            E-mail: <input type="text" name="email" value="<?php echo isset($old_data["email"]) ? $old_data["email"] : "" ?>">
            <span class="error">* <?php echo isset($errors["email"]) ? $errors["email"] : "" ?></span>
            <br><br>
            Website: <input type="text" name="website" value="<?php echo isset($old_data["website"]) ? $old_data["website"] : "" ?>">
            <span class="error"></span>
            <br><br>
            Comment: <textarea name="comment" rows="5" cols="40"><?php echo isset($old_data["comment"]) ? $old_data["comment"] : "" ?></textarea>
            <br><br>
            Gender:
            <input type="radio" name="gender" value="female" <?php echo (isset($old_data["gender"]) && $old_data["gender"] == "female") ? "checked" : "" ?>>Female
            <input type="radio" name="gender" value="male" <?php echo (isset($old_data["gender"]) && $old_data["gender"] == "male") ? "checked" : "" ?>>Male
            <input type="radio" name="gender" value="other" <?php echo (isset($old_data["gender"]) && $old_data["gender"] == "other") ? "checked" : "" ?>>Other
            <span class="error">* <?php echo isset($errors["gender"]) ? $errors["gender"] : "" ?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <?php
    // sau khi in lại dữ liệu cũ và hiện thị thông báo lỗi xong
    // thì hủy hết các session dữ liệu cũ và lỗi để tránh việc F5 lại vẫn gặp thông báo lỗi
    unset($_SESSION["errors"]);
    unset($_SESSION["old_data"]);

    ?>

</body>
</html>
