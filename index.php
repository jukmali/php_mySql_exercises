<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>R0315 - Web App Development with PHP/SQL - Code for Hands on Exercises</h1>
    <?php
    /**
     * Created by PhpStorm.
     * User: MEILOHI
     * Date: 23.11.2018
     * Time: 10.34
     */
        $dir    = getcwd (  );
        $files = scandir($dir, 1);
        $html = '<ul>';
        foreach ($files as $key => $value) {
            if(is_dir($value) && substr($value, 0,1 )!=".") {
                if($value != 'img' && $value != 'css' ) {
                    $html .= '<li><a href="' . $value . '">' . $value . '</a></li>';
                }
            }
        }
        $html .= '</ul>';
        echo $html;
    ?>
</body>
</html>
