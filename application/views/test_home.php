<!DOCTYPE html>
<!--
Testing for orr-projects
-->
<html>
    <meta charset="UTF-8">
    <title>Testing for orr-projects</title>
    <?php foreach ($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <?php foreach ($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    <body>
        <?php
        // put your code here
        ?>
        <div>
            <a href='<?php echo index_page() ?>'>index_page</a> |
            <a href='<?php echo site_url() ?>'>site_url</a> |
            <a href='<?php echo base_url() ?>'>base_url</a> |
            <a href='<?php echo current_url() ?>'>current_url</a> |
            <a href='<?php echo uri_string() ?>'>uri_string</a> | 
            <?php echo anchor(current_url(), 'anchor', ['title' => 'The Anchor!']) ?>
        </div> <div style='height:20px;'></div>  
        <div>
            <?php echo $output; ?>
        </div>
        <form class="form-signin"action="/action_page.php">
            <div >
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
                <input type="checkbox" checked="checked"> Remember me
            </div>

            <div style="background-color:#f1f1f1">
                <button type="button" >Cancel</button>
                <span >Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </body>
</html>
