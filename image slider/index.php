<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Image Slider</title>

        <!-- css -->        
        <link rel="stylesheet" href="styles/styles.css" type="text/css" media="screen" />
        
        <!-- javascript -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="scripts/rotator.js"></script>
    </head>
    
    <body>
        <div id="imageSlider">
            <div id="displayContainer" class="display">
                <a href="javascript:void(0)"><img id="displayImg" class="display" /></a>
                
                <div class="nav" id="prev-nav"></div>
                <div class="nav" id="next-nav"></div>
            </div>
        
            <div id="thumbsContainer">
                <ul id="listOfThumbs">
<?php
    if ($handle = opendir(dirname(__FILE__) . '/images/properties')) {
        while (false !== ($entry = readdir($handle))) {
            if (strstr($entry, ".jpg")):
?>
                    <li><a href="javascript:void(0)"><img src="images/properties/<?php echo $entry; ?>" class="thumbs" /></a></li>
<?php
            endif;
        }
    
        closedir($handle);
    }
?>
                </ul>
            </div>
        </div>        
    </body>
</html>