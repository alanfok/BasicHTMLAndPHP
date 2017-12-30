




<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--check-->
    <!--https://www.google.ca/search?biw=1280&bih=703&tbm=isch&sa=1&ei=LR8gWrL0JYTE_QaTnKuABQ&q=rent+sign&oq=rent+sign&gs_l=psy-ab.3..0l2j0i30k1l2j0i5i30k1l6.23272.26447.0.26806.5.5.0.0.0.0.69.249.4.4.0....0...1c.1.64.psy-ab..1.4.249...0i67k1.0._EHlxyGvyn4#imgdii=VEhwXQq98pDdOM:&imgrc=DFExcma8s5fpCM:-->
    <meta charset="UTF-8">
    <title>Alan's Apartment Search Form</title>
    <style type="text/css">
        body {background-color: yellow }
        .fieldset1 {background-color: lightgreen;
            border-color: darkgreen;}
        .fieldset2 {background-color: lightblue;
            border-color: dodgerblue}
        .legend1 {color: darkgreen;
            font-weight: bold}
        .legend2 {color: dodgerblue;
            font-weight: bold}
        .tab{margin-left:3px;}
        fieldset.fieldset1 label{color: #87af75;}
        fieldset.fieldset2 label{color: cornflowerblue;}
        p {font-weight: bold;}
        label{font-weight: lighter;}
        li {font-weight: bold;}

        .visible {
            visibility: visible
        }

        .hidden {
            visibility: hidden
        }

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



<form action="Search.php" method="post">
    <fieldset class="fieldset1">
        <legend class="legend1">Renter(s) Information</legend>
        <p>How many people will live in the apartment <select>

            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6 or +</option>
        </select>
        </p>

        <p>Smoker <input type="radio" name="smoker" value="yes"/><label>Yes</label>
            <input type="radio" name="smoker" value="no"/><label>No</label></p>

        <p> Any pets?<br/>
            <input type="checkbox" name="pet[]" value="cat"/><label>Cat(s)</label><br/>
            <input type="checkbox" name="pet[]" value="dog"/><label>Dog(s)</label><br/>
            <input type="checkbox" name="pet[]" value="another"/><label>Another</label> Specify <input type="text"><br/>
            <input type="checkbox" name="pet[]" value="noPet"/><label>No Pet</label><br/>
        </P>

    </fieldset><br/>
    <fieldset class="fieldset2">
        <legend class="legend2">What are you looking for? </legend>

        <ul>
            <li>Size of apartment<br/>
                <input type="checkbox" name="size[]" value="1.5" id="one"/><label>Studio</label>
                <input type="checkbox" name="size[]" value="3.5" id="three"/><label>3<sup>1</sup>&frasl;<sub>2</sub></label>
                <input type="checkbox" name="size[]" value="4.5" id="four"/><label>4<sup>1</sup>&frasl;<sub>2</sub></label>
                <input type="checkbox" name="size[]" value="5.5" id="five" onclick="show()"/><label>5<sup>1</sup>&frasl;<sub>2</sub></label>
                <input type="checkbox" name="size[]" value="6.5" id="six"  onclick="show()"/><label>6<sup>1</sup>&frasl;<sub>2</sub>or over</label></li>

            <li>Do you have preferred location<br/>
                <input type="checkbox" name="location[]" value="Doval"><label>Doval</label>
                <input type="checkbox" name="location[]" value="WestIsland"/><label>West Island</label>
                <input type="checkbox" name="location[]" value="Downtown" id="Downtown" onclick="show()" value=""/><label>Downtown</label>
                <input type="checkbox" name="location[]" value="StLarent"/><label>Ville St Laurant</label>
                <input type="checkbox" name="location[]" value="NDG"/><label>NDG</label>
                <input type="checkbox" name="location[]" value="Another"/><label>Another</label></li>
            <li>Price Range/month<br/>
                &emsp;<select id="price" name="prices" onchange="show()">
                   
                    <option value="500"> &lt;500</option>
                    <option value="750">501-750</option>
                    <option value="1000">751-1000</option>
                    <option value="1250">1001-1250</option>
                    <option value="1500">1251-1500</option>
                    <option value="1501">1501&gt;</option>
                </select>
            </li>
            <li>Would be nice to have <br/>
                <input type="checkbox" name="ass[]" value="Gym"/><label>Gym</label>
                <input type="checkbox" name="ass[]" value="Laundryroom"/><label>Laundry room</label>
                <input type="checkbox" name="ass[]" value="parking"/><label>Indoor Parking</label>
                <input type="checkbox" name="ass[]" value="Security"/><label>Security</label>
                <input type="checkbox" name="ass[]" value="Locker"/><label>Locker</label>
            </li>
        </ul>
    </fieldset>
</br>
    <p style="color: red">the information,please select the price range over $500</br>3.5,Downtown,500,adress1</br>4.5,Downtown,1000,adress12</br>3.5,Downtown,700,adress123</br>5.5,Downtown,500,adress1543</p></br>

    </fieldset>
    <fieldset class="fieldset3">
        <div>
       <p id="expert1" class="hidden" >Expert advise, it usually cost more than 1000</p></div>
        <p id="expert2" class="hidden">it's hard to find bigger the 4<sup>1</sup>&frasl;<sub>2</sub> in downtown.</p>
    </fieldset>
    <label>Let's see what we find</label><br/>
    <input type="submit" name="submit" value="Search" />
    <input type="reset" value="Start Over"/>
     <br/>
    <?php include 'footer.php';?>

</form>
</body>
</html>