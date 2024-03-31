<form method="post">
        <fieldset>
            <legend>
                <h1>#write-comment</h1>
            </legend>
            <?php displayFormField("name", "Name", $name, $errors[1]); ?>
            <?php displayFormField("mail", "Mail", $mail, $errors[2]); ?>
            <div class="e_form">
                <label for="comment">Comment:<br><br>
                    <textarea name="comment" id="comment" cols="30" rows="10"><?php echo $comment; ?></textarea>
                    <?php echo $errors[3]; ?>
                </label>
            </div>
            <div style="margin: 10px; font-size: 12px">
                <input type="checkbox" name="agree" id="agree" <?php echo $agree ? 'checked' : ''; ?>>
                <label for="agree">Do you agree with data processing?</label>
                <?php echo $errors[4]; ?>
            </div>
            <div class="submit">
                <input type="submit" value="Send">
            </div>
        </fieldset>
    </form>