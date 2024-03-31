<?php
    $name = $mail = $comment = $agree = '';
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $mail = $_POST["mail"];
        $comment = $_POST["comment"];
        $agree = isset($_POST["agree"]);

        $errors = validateForm($name, $mail, $comment, $agree);
    }

    function validateForm($name, $mail, $comment, $agree)
    {
        $errors = [];

        if (strlen($name) < 3 || strlen($name) > 20 || preg_match("/\d/", $name)) {
            $errors[1] = "Invalid name. It should be 3-20 characters long and contain no digits.";
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors[2] = "Invalid email address.";
        }

        if (empty($comment)) {
            $errors[3] = "Comment cannot be empty.";
        }

        if (!$agree) {
            $errors[4] = "You must agree with data processing.";
        }

        return $errors;
    }

    if (empty($errors)){
        $data = [$name,", ", $mail,", ", $comment,", ", $agree, "\n"];
        file_put_contents("data.txt", $data, FILE_APPEND);
    }
    ?>

<?php
function displayFormField($name, $label, $value, $error)
{
    ?>
    <div class="e_form">
        <label for="<?php echo $name; ?>"><?php echo $label; ?>:
            <input type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
            <?php echo $error; ?>
        </label>
    </div>
    <?php
}
?>