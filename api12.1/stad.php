<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
$container = new Container($configuration);
$dbm=$container->getDBM();

PrintHead();
PrintJumbo();
PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php

        if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        $rows = $dbm->GetData( "select * from image where img_id=" . $_GET['img_id'] );


        //get template
        $template = file_get_contents("templates/column_full.html");

        $data = $container->getLoader($rows[0]);
        $city=$data->getCity()->getArray();

        $output=$template;
        foreach (array_keys($city) as $field)
        {
            $output = str_replace( "@$field@", $city["$field"], $output );
        }
        print $output;

        ?>

    </div>
</div>

</body>
</html>