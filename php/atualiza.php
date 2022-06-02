<html lang="pt-br">
    <head>
        <title>Menu Foods</title>   
        <script>
            $(document).ready(function () {
                window.location.href = '#foo';
            });
        </script>
        <script type="text/javascript">
            function atual() {
                document.write('<div id=\"loadings\"><img src=\"./assets/css/images/loader.gif\"></div>');
                setTimeout("window.location='editar_perfil'", 2000);
            }
        </script>  
    </head>
    <body>
        <h3>Aguarde...</h3>
        <script>atual();</script>
        <br /><br />   
        <a href="#" id="foo"></a>
    </body>
</html>


