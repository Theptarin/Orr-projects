<!DOCTYPE html>
<!--
Testing for orr-projects
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Testing for orr-projects</title>
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
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
            <?php echo anchor(current_url(), 'anchor', ['title' => 'The Anchor!']) ?>
        </div> <div style='height:20px;'></div>  
        <div>
            <?php echo $output; ?>
        </div>
        <div class="jumbotron text-center">
            <h1>My First Bootstrap Page</h1>
            <p>Resize this responsive page to see the effect!</p> 
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Column 1</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                    <h3>Column 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                    <h3>Column 3</h3>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
            </div>
        </div>

    </body>
</html>
