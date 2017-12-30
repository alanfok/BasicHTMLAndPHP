







<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--check-->
    <meta charset="UTF-8">
    <title>Alan's Apartment Search Form</title>
    <style type="text/css">
        body {background-color: yellow }
    </style>
    <script type="text/javascript" src="A3Q5.js"></script>
</head>
<body>

<div align="right">
    <?php
    if(isset($_SESSION['Username'])) {
        echo "Welcome " . $_SESSION['Username'];
        echo "<form action='logout.php' ><input type='submit' value='logout'></form>";
    }
    else{
        echo "<form action='login.php'><input type='submit' value='Login'></form>";
    }

    ?>
</div>
<?php include 'header.php';?>
<?php

if(isset($_SESSION['Username'])) {

    if (isset($_POST["submit"])) {

        if (isset($_POST["size"])) {
            $Size = $_POST["size"];
            $Sizesize = count($Size);
        }
        if (isset($_POST["location"])) {
            $Location = $_POST["location"];
            $Locsize = count($Location);

        }


        $Price = $_POST["prices"];


        $file = fopen("information.txt", "r");
        $counter = array();
        $arr = array();
        $index = 0;
        while (!feof($file)) {
            $temp = fgets($file);

            $counter[$index] = $temp;


            $index++;

        }
        $temparr = array();
        $show0 = true;
        //$show1;

        foreach ($counter as $value) {
            $temparr[] = explode(",", $value);

        }


        for ($i = 0; $i < count($counter); $i++) {
            $str = (double)$temparr[$i][0];
            $loc = $temparr[$i][1];
            $pri = $temparr[$i][2];

            if ($Price > $pri) {
                if (empty($Size) && empty($Location)) {

//printout

                    echo " Size :";
                    print_r($temparr[$i][0]);
                    echo "  Location :";
                    print_r($temparr[$i][1]);
                    echo "  Price: " . $temparr[$i][2];
                    //print_r($temparr[$i][2]);
                    echo " $ Address: " . $temparr[$i][3];


                    echo "<br/>";


                } elseif (!empty($Size)) {
                    for ($j = 0; $j < $Sizesize; $j++) {
                        if ($Size[$j] == $str) {
                            if (empty($Location)) {


                                echo " Size : ";
                                print_r($temparr[$i][0]);
                                echo "   Location : ";
                                print_r($temparr[$i][1]);
                                echo " Price: " . $temparr[$i][2];
                                //print_r($temparr[$i][2]);
                                echo " $ Address: " . $temparr[$i][3];


                                echo "<br/>";
                            } else {
                                for ($l = 0; $l < $Locsize; $l++) {
                                    if ($Location[$l] == $loc) {
//printout
                                        echo " Size : ";
                                        print_r($temparr[$i][0]);
                                        echo "   Location : ";
                                        print_r($temparr[$i][1]);
                                        echo " Price:" . $temparr[$i][2];
                                        //print_r($temparr[$i][2]);
                                        echo " $ Address: " . $temparr[$i][3];


                                        echo "<br/>";
                                    }
                                }
                            }
                        }
                    }
                } elseif (empty($Size)) {
                    if (!empty($Location)) {
                        for ($j = 0; $j < $Locsize; $j++) {
                            if ($Location[$j] == $loc) {
//print out
                                echo " Size : ";
                                print_r($temparr[$i][0]);
                                echo "   Location : ";
                                print_r($temparr[$i][1]);
                                echo " Price: " . $temparr[$i][2];
                                //print_r($temparr[$i][2]);
                                echo " $ Address: " . $temparr[$i][3];


                                echo "<br/>";
                                echo "<br/>";
                            } elseif (empty($Location)) {
//printout
                                echo " Size : ";
                                print_r($temparr[$i][0]);
                                echo "   Location : ";
                                print_r($temparr[$i][1]);
                                echo " Price: " . $temparr[$i][2];
                                //print_r($temparr[$i][2]);
                                echo "  $ Address: " . $temparr[$i][3];


                                echo "</br>";
                            }
                        }
                    }

                }


            }

        }


        //print_r($temparr[1][0]);


    }


}
else{
    echo"You have to login first";
    echo"<br/>";
}
?>








    <?php include 'footer.php';?>

</form>
</body>
</html>