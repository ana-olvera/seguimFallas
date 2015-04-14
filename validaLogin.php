<?php
    session_start();
    require_once("clases/usuariosModelo.php");

    //Var $_POST type
    $nombre = $_POST["nomUsuario"];
    $pass = $_POST["contUsuario"];

    //Var para la consulta
    $userModel = new usuariosModelo();    
    $respUser = $userModel->get_user($nombre, $pass);

    //Var de Sesion
    $_SESSION["nombre"]=$respUser[0]['nombreUsuario'];
    $_SESSION["area"]=$respUser[0]['areaPersona'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="ISO-8859-1" />
        <title>Bienvenido</title>
        <link rel="stylesheet" href="../css/primeui-1.1.css" />
        <link rel="stylesheet" href="../css/primeTheme.css" />
        <link rel="stylesheet" href="../css/siteTheme.css" />
        <link rel="stylesheet" href="../css/primeui-1.1-min.css" />
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/primeui-1.1.js"></script>
        <script type="text/javascript" src="../js/primeui-1.1-min.js"></script>
        <?php
            //Código de validación para el login
            if($respUser[0]['bandLogin']==1){
                if($respUser[0]['areaPersona']=='DGIRA'){
                    header("Location:DGIRA/bandDgira.php");
                }elseif($respUser[0]['areaPersona']=='CASE SOLUTIONS'){
                    header("Location:CASE/bandCase.php");
                }
            }else{
                echo '<script type="text/javascript">';
                    echo "\$(function() {";
                        echo "\$('#dlgLog').puidialog({";
                            echo "showEffect: 'fade',";
                            echo "hideEffect: 'fade',";
                            echo "minimizable: false,";
                            echo "maximizable: false,";
                            echo "modal: true,";
                            echo "buttons: [{";
                                echo "text: 'Aceptar',";
                                echo "icon: 'ui-icon-check',";
                                echo "click: function() {";
                                    echo "\$('#dlg').puidialog('hide');";
                                    echo "window.location='default.php'";
                                echo "}";
                            echo "}]";
                        echo "});";
                    echo "});";
                echo '</script>';
            }
        ?>
    </head>
    <body>
        <div id="centro">
            <div id="dlgLog" title="Aviso">
                <p>El usuario/password no coinciden.</p>
                <p>Favor de verificarlo</p>
            </div>    
        </div>
    </body>
</html>