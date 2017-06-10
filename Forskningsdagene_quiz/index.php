<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
       /*
        * Line 1 = White hat
        * Line 2 = Black hat
        * Line 3 = Neutral
        */
        $filename = "data.txt";
        $lines = file( $filename , FILE_IGNORE_NEW_LINES );
       
        $value = $_POST["verdi"];
        if($value === "1"){
            $tall = $lines[0];
            $tall++;
            $lineNr = 0;
        } elseif($value === "2"){
            $tall = $lines[1];
            $tall++;
            $lineNr = 1;
        } else {
            $tall = $lines[2];
            $tall++;
            $lineNr = 2;
        }
        
        $lines[$lineNr] = $tall;
        file_put_contents( $filename , implode( "\n", $lines ) );
        ?>  
    </body>
</html>
