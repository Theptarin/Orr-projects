<!DOCTYPE html>
<!--
Testing for orr-projects
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Testing for orr-projects</title>
    </head>
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
            <?php echo anchor(current_url(), 'anchor' , ['title' => 'The Anchor!']) ?>
        </div>
    </body>
</html>
