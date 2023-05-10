<?php
$num = isset($_REQUEST['num']) ? $_REQUEST['num'] : NULL;
$oper = isset($_REQUEST['oper']) ? $_REQUEST['oper'] : NULL;
$visor = isset($_REQUEST['visor']) ? $_REQUEST['visor'] : "0";
$miembro1 = isset($_REQUEST['miembro1']) ? $_REQUEST['miembro1'] : NULL;
$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
$ac = isset($_REQUEST['AC']) ? TRUE : FALSE;
$percent = isset($_REQUEST['percent']) ? TRUE : FALSE;
$plusminus = isset($_REQUEST['plusminus']) ? TRUE : FALSE;
if ($ac == TRUE) {
    $visor = "0";
    $ac=FALSE;

} elseif ($percent == TRUE) {
    $visor /= 100;
    $percent=FALSE;
} elseif ($plusminus == TRUE) {
    $visor = 0-$visor;
    $plusminus=FALSE;
} else {

    if ($oper != NULL) {
        if ($oper == '=') {
            switch ($op) {
                case '+':
                    $visor = $miembro1 + $visor;
                    break;
                case '-':
                    $visor = $miembro1 - $visor;
                    break;
                case '*':
                    $visor = $miembro1 * $visor;
                    break;
                case '/':
                    $visor = $miembro1 / $visor;
                    break;
            }
        } else {
            
        $miembro1 = $visor;
        $op = $oper;
        $visor = "0";
        }
    } elseif ($num != NULL) {
        if ($visor == "0" && $num != ".") {
            $visor = $num;
        } else {
            $visor .= $num;
        }
    } else {
        $visor = ($visor) ? $visor : "0";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
    <form action="index.php">
    <div class="container">
        <table>
          <tr>
            <td colspan="4">
            <input readonly type="text" value="<?php echo $visor?>" name="visor" class="display" />
            </td>
          </tr>
          <tr>
            <td class="btn-container">
                <button class="btnLightgray" type="submit" name="AC" value="AC">AC</button>
            </td>
            <td class="btn-container">
                <button class="btnLightgray" type="submit" name="plusminus" value="pm">
                    <span class="pmplus"><sup>+</sup>/<sub>-</sub></span>
                </button>
            </td>
            <td class="btn-container">
                <button class="btnLightgray" type="submit" name="percent" value="%">%</button>
            </td>
            <td class="btn-container">
                <button class="btnOrange" type="submit" name="oper" value="/">&divide;</button>
            </td>
          </tr>
          <tr>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value="7">7</button>
            </td>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value="8">8</button>
            </td>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value="9">9</button>
            </td>
            <td class="btn-container">
                <button class="btnOrange" type="submit" name="oper" value="*">&times;</button>
            </td>
          </tr>
          
          <tr>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value="4">4</button>
            </td>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value="5">5</button>
            </td>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value="6">6</button>
            </td>
            <td class="btn-container">
                <button class="btnOrange" type="submit" name="oper" value="-">&minus;</button>
            </td>
          </tr>
          
          <tr>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value="1">1</button>
            </td>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value="2">2</button>
            </td>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value="3">3</button>
            </td>
            <td class="btn-container">
                <button class="btnOrange" type="submit" name="oper" value="+">&plus;</button>
            </td>
          </tr>
          <tr>
            <td class="btn-container" colspan="2">
                <button class="btnDarkgray largebtn" type="submit" name="num" value="0">0</button>
            </td>
            <td class="btn-container">
                <button class="btnDarkgray" type="submit" name="num" value=".">,</button>
            </td>
            <td class="btn-container">
                <button class="btnOrange" type="submit" name="oper" value="=">&equals;</button>
            </td>
          </tr>
        </table>
        <input type="hidden" name="miembro1" value="<?php echo $miembro1;  ?>" />
        <input type="hidden" name="op" value="<?php echo $op; ?>" />
      </div>
    </form>
</body>
</html>