<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Bienvenido</title>
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
                $('#login').puifieldset();
                $('#nomUsuario').puiinputtext();
                $('#contUsuario').puiinputtext();
                $('#btnEntrar').puibutton({
                    icon: 'ui-icon-key'
                });
                $('#btnCancelar').puibutton({
                    icon: 'ui-icon-refresh'
                });
                $('#notifytop').puinotify({
                    easing: 'easeInOutCirc'
                });  
            });
        </script>
    </head>
    <body>
        <div id="notifytop"></div>
        <div id="centro">
            <form id="formLogin" action="validaLogin.php" method="post">
                <fieldset id="login" style="margin-bottom:20px">
                    <legend>Iniciar Sesi&oacute;n</legend>
                    <br />
                    <span style="padding-left: 168px;">
                        Nombre de usuario:
                        <input id="nomUsuario" type="text" name="nomUsuario" />
                    </span>
                    <br />
                    <br />
                    <span style="padding-left: 168px;">
                        Contraseña :
                        &emsp;&emsp;&ensp;&ensp;
                        <input id="contUsuario" type="password" name="contUsuario" />
                    </span>
                    <br />
                    <br />
                    <span style="padding-left: 220px;">
                        <button id="btnEntrar" type="submit">Ingresar</button>
                        <button id="btnCancelar" type="reset">Cancelar</button>
                    </span>
                </fieldset>
            </form>
        </div>
    </body>
</html>
