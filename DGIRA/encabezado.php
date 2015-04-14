<?php
    session_start();
    require("../clases/solicitudesModelo.php");
    $solicitudModel = new solicitudesModelo();
    $a_solicitudes = $solicitudModel->get_solicitudes();

    //Creamos el JSON
    $json_string = json_encode($a_solicitudes);
    //Crea un archivo de tipo JSON
    /*$file = '../json/solicitudes.json';
    file_put_contents($file, $json_string);*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="ISO-8859-1" />
        <title>Bandeja de Entrada</title>
        <link rel="stylesheet" href="../css/primeui-1.1.css" />
        <link rel="stylesheet" href="../css/primeTheme.css" />
        <link rel="stylesheet" href="../css/siteTheme.css" />
        <link rel="stylesheet" href="../css/primeui-1.1-min.css" />
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/primeui-1.1.js"></script>
        <script type="text/javascript" src="../js/primeui-1.1-min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#default').puifieldset();
                $('#pie').puifieldset();
                $('#datosUsuario').puifieldset();
                $('#bcDgira').puibreadcrumb();
                $('#btnSalir').puibutton({
                    icon: 'ui-icon-arrowthickstop-1-e',
                    click: function () {
                        window.location = '../logout.php';
                    }
                });
                $('#btnInicio').puibutton({
                    icon: 'ui-icon-home',
                    click: function () {
                        window.location = 'bandDgira.php';
                    }
                });
                $('#btnNuevo').puibutton({
                    icon: 'ui-icon-plusthick',
                    click: function () {
                        //$('#external').puilightbox('show')  
                    }
                });
            });
        </script>
         <?php
            echo '<script type="text/javascript">';
                echo "\$(function () {";
                    echo "\$('#tblSol').puidatatable({";
                        echo "caption: 'Historial de Solicitudes',";
                        echo "paginator: {";
                            echo "rows: 10";
                        echo "},";
                        echo "columns: [";
                            echo "{field:'folio', headerText: 'Folio', sortable:true},";
                            echo "{field:'fechaSol', headerText: 'Fecha de Solicitud', sortable:true},";
                            echo "{field:'solicitante', headerText: 'Nombre del solicitante', sortable:true},";
                            echo "{field:'aplicativo', headerText: 'Aplicativo', sortable:true},";
                            echo "{field:'diasTransc', headerText: 'Dias transcurridos', sortable:true},";
                            echo "{field:'estatus', headerText: 'Estatus', sortable:true},";
                        echo "],";
                        echo "datasource: ".$json_string.",";
                        echo "selectionMode: 'multiple',";
                        echo "rowSelect: function(event, data) {";
                            echo "\$('#messages').puigrowl('show', [{severity:'info', summary: 'Row Selected', detail: (data.folio + ' ' + data.solicitante)}]);";
                        echo "},";
                        echo "rowUnselect: function(event, data) {";
                            echo "\$('#messages').puigrowl('show', [{severity:'info', summary: 'Row Unselected', detail: (data.folio + ' ' + data.solicitante)}]);";
                        echo "}";
                    echo "});";
                    echo "\$('#messages').puigrowl();";
                echo "});";
            echo '</script>';
        ?>       
    </head>
    <body>
        <div id="header">
            <h1>Sistema de Seguimiento a Fallas</h1>
        </div>
        <div id="botonesHeader">
            <ul>
                <li><button id="btnSalir" type="button">Cerrar Sesi&oacute;n</button></li>
                <li><button id="btnNuevo" type="button">Nueva Solicitud</button></li>
                <li><button id="btnInicio" type="button">Inicio</button></li>
                <li>
                    <fieldset id="datosUsuario"><?php echo $_SESSION["nombre"];?></fieldset>
                </li>
            </ul>
            <a id="external" href="frmSolicitud.php"></a>
        </div>
        <div id="messages"></div> 