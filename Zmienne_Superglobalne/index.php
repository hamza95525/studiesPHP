<?php
error_reporting(-1);
ini_set("display_errors", "On");
?>
<html>
<head>
    <title>Superglobals</title>

    <style type="text/css">
        .block {
            display: inline-block;
            width: 30px;
            height: 30px;
            padding: 0px;
            margin: 0px;
        }
        .block:hover {
            background-color: lightgray;
        }

        .red {
            background-color: red;
        }
        .blue {
            background-color: blue;
        }
        .green {
            background-color: green;
        }
        .gray {
            background-color: gray;
        }
        .white {
            background-color: white;
        }
        .linia {
            background-color: lightgray;
        }

    </style>
</head>
<body>

<div>
    <?php
    #==================ALGORYTM LINIOWY BRESENHEIMA DO WYLICZANIA LINII(źródło: wikipedia)====================================

    function BresenhamLow($x1,$y1,$x2,$y2,$arr){

        #$arr = array();
        $dx = $x2 - $x1;
        $dy = $y2 - $y1;
        $yi = 1;
        if($dy < 0){
            $yi = -1;
            $dy = -$dy;
        }

        $D = 2*$dy - $dx;
        $y = $y1;

        for ($x = $x1; $x <= $x2; $x++) {
            #echo "($x,$y)<br>";

            $arr[$x][$y] = 1;
            if ($D > 0) {
                $y = $y + $yi;
                $D = $D - 2 * $dx;
            }

            $D = $D + 2 * $dy;
        }
        return $arr;
    }
    #=========================================================

    function BresenhamHigh($x1,$y1,$x2,$y2,$arr){

        #$arr = array();
        $dx = $x2 - $x1;
        $dy = $y2 - $y1;
        $xi = 1;
        if($dx < 0){
            $xi = -1;
            $dx = -$dx;
        }

        $D = 2*$dx - $dy;
        $x = $x1;

        for ($y = $y1; $y <=$y2; $y++) {
            # echo "($x,$y)<br>";
               $arr[$x][$y] = 1;
                if ($D > 0) {
                    $x = $x + $xi;
                    $D = $D - 2 * $dy;
                }

                $D = $D + 2 * $dx;
            }

        return $arr;
    }



    #===========================STWORZENIE FORMULARZA============================
    echo "<form method=\"post\">";
    echo "<label>WIERSZE</label> <input type=\"text\" name=\"W\" />";
    echo "<label>KOLUMNY</label> <input type=\"text\" name=\"K\" />";
    echo
    "<select name=\"color\">
            <option name='red'>red</option>
            <option name='blue'>blue</option>
            <option name='green'>green</option>
            <option name='gray'>gray</option>
            <option name='white'>white</option>
        </select>";
    echo "<input type=\"submit\" value=\"Change\" name='Reset'>";

    echo "</form>";
    session_start();

    #WARUNKOWE USTALANIE ZMIENNYCH SX ORAZ SY, KTORE BEDA UZYTE PRZY TWORZENIU "KAFELKOW"
    if(!empty($_POST['W']))
        $sx = $_POST['W'];
    elseif(!empty($_SESSION['W']))
       $sx = $_SESSION['W'];
    else
        $sx=10;

    if(!empty($_POST['K']))
        $sy = $_POST['K'];
    elseif(!empty($_SESSION['K']))
       $sy = $_SESSION['K'];
    else
        $sy=10;


    #USTAWIANIE ZMIENNEJ COOKIE
    $cookie_name = "MyCookie";
    if(!empty($_POST['color'])) {
        $color = $_POST['color'];
    }
    else
        $color = $_COOKIE[$cookie_name];
    
    setcookie($cookie_name,$color,time()+(86400 * 30));

    if(isset($_POST['Reset'])){ #po wkliknieciu przyciska change poprzednie linie powinny byc usuniete
        session_unset();
        unset($_GET['x']); unset($_GET['y']);
    }



    #=================tworzenie tablicy MyArray ktora bedzie przesylana pozniej do funkcji===============

    $Empty=array_fill(1,$sx,array_fill(1,$sy,0));

    if(!empty($_SESSION['arr'])){
        $MyArray = $_SESSION['arr']; #poprzednia wartosc myarray w celu zachowania "linii"
    }
    else {
        $MyArray = $Empty; #wypelnienie wszystkiego zerami jezeli sesja byla pusta
    }

   /*for($i=0;$i<$sx; $i++){
        for($j=0;$j<$sy;$j++){
            echo $MyArray[$i][$j];
            echo " ";
        }
        echo "<br>";
    }*/

    #====================pobieranie zmiennych x i y z url bądź z sesji====================================

    if(empty($_SESSION['x']) && !empty($_SESSION['y'])) {
        $x1 = $_GET['x']; $y1 = $_GET['y'];
        $_SESSION['x'] = $_GET['x'];
        $_SESSION['y'] = $_GET['y'];
    }
    elseif(!empty($_SESSION['x']) && !empty($_SESSION['y'])){
        $x1 = $_SESSION['x']; $y1 = $_SESSION['y'];
    }

    if(isset($_GET['x']) && isset($_GET['y'])){
        $x2 = $_GET['x']; $y2 = $_GET['y'];
        $_SESSION['x'] = $x2;
        $_SESSION['y'] = $y2;
        unset($_GET['x']); unset($_GET['y']);
    }

    #=====================w zależności od połozenia współrzędnych będzie się wykonywała odpowiednia funkcja=============

    if(isset($x1,$x2,$y1,$y2)) {
        if (($x1 != $x2) && ($y1 != $y2)) //jezeli sa dwa klikniecia w ten sam punkt, to rysowanie sie nie wykona
        {
            if (abs($y2 - $y1) < abs($x2 - $x1)) {
                if ($x1 > $x2)
                    $MyArray = BresenhamLow($x2, $y2, $x1, $y1, $MyArray);
                else
                    $MyArray = BresenhamLow($x1, $y1, $x2, $y2, $MyArray);
            } else {
                if ($y1 > $y2)
                    $MyArray = BresenhamHigh($x2, $y2, $x1, $y1, $MyArray);
                else
                    $MyArray = BresenhamHigh($x1, $y1, $x2, $y2, $MyArray);
            }
        } else if (($x1 == $x2) && ($y1 != $y2)) {
            if (abs($y2 - $y1) < abs($x2 - $x1)) {
                if ($x1 > $x2)
                    $MyArray = BresenhamLow($x2, $y2, $x1, $y1, $MyArray);
                else
                    $MyArray = BresenhamLow($x1, $y1, $x2, $y2, $MyArray);
            } else {
                if ($y1 > $y2)
                    $MyArray = BresenhamHigh($x2, $y2, $x1, $y1, $MyArray);
                else
                    $MyArray = BresenhamHigh($x1, $y1, $x2, $y2, $MyArray);
            }
        } else if (($x1 != $x2) && ($y1 == $y2)) {
            if (abs($y2 - $y1) < abs($x2 - $x1)) {
                if ($x1 > $x2)
                    $MyArray = BresenhamLow($x2, $y2, $x1, $y1, $MyArray);
                else
                    $MyArray = BresenhamLow($x1, $y1, $x2, $y2, $MyArray);
            } else {
                if ($y1 > $y2)
                    $MyArray = BresenhamHigh($x2, $y2, $x1, $y1, $MyArray);
                else
                    $MyArray = BresenhamHigh($x1, $y1, $x2, $y2, $MyArray);
            }

        }
    }



    #==============================================TWORZENIE "KAFELKÓW"================================================

    echo "<div>";
    for($i=1; $i<=$sx; $i++) {
        for($j=1; $j<=$sy; $j++) {
            if($MyArray[$i][$j] == 1) #jezeli pod bloczkiem "kryje sie" jedynka to rysujemy
                echo "<a href=\"?x=$i&y=$j\"class=\"block linia\"></a>"; #POMOCNICZE X I Y DO SPRAWDZENIA WSPOLRZEDNYCH
            else {
                echo "<a href=\"?x=$i&y=$j\"class=\"block $color\"></a>"; #POMOCNICZE X I Y DO SPRAWDZENIA WSPOLRZEDNYCH
            }
                echo " ";
        }
        echo "<br>";
    }
    echo "</div>";

    $_SESSION['arr'] = $MyArray;
    $_SESSION['W'] = $sx;
    $_SESSION['K'] = $sy;
    ?>
</div>


</body>
</html>
