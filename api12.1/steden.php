<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
$container = new Container($configuration);
$ms= $container->getMS();
$dbm=$container->getDBM();

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
//PrintMessages();
?>

<div class="container">
    <div class="row">

<?php
    //toon messages als er zijn
//    foreach ( $msgs as $msg )
//    {
//        print '<div class="msgs">' . $msg . '</div>';
//    }

    $ms->ShowInfos();

    //get data
    $data = $dbm->GetData( "select * from image" );
    $citys=[];

    foreach ($data as $row)
    {
        $city=$container->getLoader($row);
        $cityArray = $city->getCity()->getArray();
        $citys[]=$cityArray;
    }

    //get template
    $template = file_get_contents("templates/column.html");
    //merge
    $output = MergeViewWithData( $template, $citys);
    print $output;
?>

    </div>
</div>

</body>
</html>