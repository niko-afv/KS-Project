PHPdefgsdf<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Clubes Conquistadores</title>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />
        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />

        <link rel="stylesheet" href="css/jquery.mobile-1.0.css" />
        <link rel="stylesheet" href="css/main.css" />
        <script type="text/javascript" src="js/jquery-1.7.js"></script>
        <script type="text/javascript" src="js/jquery.mobile-1.0.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/messages_es.js"></script>
        
        <script type="text/javascript" src="forms.js"></script>
    </head>
    <body>

        <?php
            include_once 'funciones.php';

            $query1 = "SELECT * FROM clubes ORDER BY nombre ASC";                                            //Sql a ejecutar
            $query2 = "SELECT * FROM roles ORDER BY nombre ASC";
            $query3 = "SELECT * FROM iglesias ORDER BY nombre ASC";

            $conn = conectar();
            //cerrarConexion($conn);
            $clubes = ejecutar($query1, $conn);
            $roles = ejecutar($query2, $conn);
            $iglesias = ejecutar($query3, $conn);
            cerrarConexion($conn);

            $option_club = generarLista($clubes, 'club');
            $option_roles = generarLista($roles, 'rol');
            $option_iglesia = generarLista($iglesias, 'iglesia');
        ?>




        <!--
                        Begin 1st Page
        -->

        <div data-role="page" id="unete">

            <div data-role="header">
                <h1>Unete!</h1>
                <div data-role="navbar" data-iconpos="bottom">
                    <ul>
                        <li><a href="#unete" data-transition="slide" data-icon="plus">Unete!</a></li>
                        <li><a href="#clubes" data-transition="slide" data-icon="star">Clubes</a></li>
                        <li><a href="#conocenos" data-transition="slide" data-icon="check">Conocenos</a></li>
                        <li><a href="#error" data-transition="slide" data-icon="check">Error</a></li>
                    </ul>
                </div>
            </div>

            <div data-role="content">	

                <form id="form_unete" action="" method="get" class="ui-body ui-body-a ui-corner-all">
                    <div data-role="fieldcontain">
                        <!--<label for='select-choice-1' class='select'>Club</label>-->
                        <select name='club' id='club'>
                            <option value="">Club</option>
                            <?php echo $option_club; ?>                             <!--Imprimimos la lista de clubes generada anteriormente-->
                        </select>
                    </div>

                    <!--<div data-role="fieldcontain">-->
                        <!--<label for='select-choice-1' class='select'>Cargo</label>-->
                        <!--<select name='cargo' id='cargo'>
                            <option value="">Cargo</option>-->
                            <?php //echo $option_roles; ?>                             <!--Imprimimos la lista de roles generada anteriormente-->
                        <!--</select>
                    </div>-->

                    <div data-role="fieldcontain" >
                        <label for="username" class="ui-hidden-accessible">Username:</label>
                        <input type="text" name="nombre" id="nombre" value="" placeholder="Nombre"/>
                    </div>

                    <div data-role="fieldcontain" >
                        <label for="email" class="ui-hidden-accessible">Email:</label>
                        <input type="email" name="email" id="email" value="" placeholder="Email"/>
                    </div>

                    <div data-role="fieldcontain">
                        <label for="password" class="ui-hidden-accessible">Contrase&ntilde;a:</label>
                        <input type="password" name="password" id="password" value="" placeholder="Contrase&ntilde;a"/>
                    </div>

                    <div data-role="fieldcontain">
                        <label for="password2" class="ui-hidden-accessible">Repita Contrase&ntilde;a:</label>
                        <input type="password" name="password2" id="password2" value="" placeholder="Repita su Contrase&ntilde;a"/>
                    </div>

                    <button type="submit" name="submit" value="submit-value" class="ui-btn-hidden" >Unirme</button>
                </form>


            </div><!-- /content -->

        </div><!-- /page -->

        <!--
                        End 1st Page
        -->







        <!--
                        Begin 2nd Page
        -->
        <div data-role="page" id="clubes">

            <div data-role="header">
                <h1>clubes</h1>
                <div data-role="navbar" data-iconpos="bottom">
                    <ul>
                        <li><a href="#unete" data-direction="reverse" data-transition="slide" data-icon="plus">Unete!</a></li>
                        <li><a href="#clubes" data-transition="slide" data-icon="star">Clubes</a></li>
                        <li><a href="#conocenos" data-transition="slide" data-icon="check">Conocenos</a></li>
                    </ul>
                </div>
            </div><!-- /header -->

            <div data-role="content">	
                <form id="form_club" method="" action="" class="ui-body ui-body-a ui-corner-all">
                    <p>Datos del club:</p>		
                    <div data-role="fieldcontain">
                        <label for="club" class="ui-hidden-accessible">Nombre del Club:</label>
                        <input type="text" name="club" id="club" value="" placeholder="Nombre del Club"/>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="director" class="ui-hidden-accessible">Director del Club:</label>
                        <input type="text" name="director" id="director" value="" placeholder="Director del Club"/>
                    </div>
                    <div data-role="fieldcontain">
                        <!--<label for="select-choice-1" class="select">Iglesia:</label>-->
                        <select name="iglesia" id="iglesia">
                            <option value="">Iglesia</option>
                            <?php echo $option_iglesia; ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" value="submit-value" class="ui-btn-hidden" >Unirme</button>
                </form>
            </div><!-- /content -->

        </div><!-- /page -->

        <!--
                        End 2nd Page
        -->










        <!--
                        Begin 3rd Page
        -->
        <div data-role="page" id="conocenos">

            <div data-role="header"><h1>Conocenos</h1>
                <div data-role="navbar" data-iconpos="bottom">
                    <ul>
                        <li><a href="#unete" data-direction="reverse" data-transition="slide" data-icon="plus">Unete!</a></li>
                        <li><a href="#clubes" data-direction="reverse" data-transition="slide" data-icon="star">Clubes</a></li>
                        <li><a href="#conocenos" data-transition="slide" data-icon="check">Conocenos</a></li>
                    </ul>
                </div>            
            </div><!-- /header -->

            <div data-role="content">
                <div data-role="collapsible">
                    <h4>Bienvenido ...</h4>
                    <p>...Al mundo del Conquistador 2.0, Donde todo conquistador tiene un lugar reservado, para contar sus experiencias
                        y contarle a otros lo divertido que es pertenecer en un club de conquistadores.</p>    
                </div>

                <div data-role="collapsible">
                    <h4>Organiza y Registra...</h4>
                    <p>A tu club, directiva, lideres y conquistadores para tener la informacion siempre a tu dispocicion.</p>    
                </div>

                <div data-role="collapsible">
                    <h4>Comparte ...</h4>
                    <p>Tus Experiencias en actividades en las que hallas participado como campamentos, camporees, convenciones, etc.
                        con tus amigos,</p>
                </div>

                <div data-role="collapsible">
                    <h4>Crea tu Perfil</h4>
                    <p>Ingresa toda la Información que quieras acerca de ti para que otros puedan conocer
                        tus datos personales, clubes a los que has pertenecido, especialidades aprobadas, etc</p>
                </div>

                <div data-role="collapsible">
                    <h4>Obten ayuda</h4>
                    <p>Si aún no has vivido la experiencia, te ayudamos a encontrar un club brindandote la informacion que necesitas,
                        clubes en tu comuna, clubes que mas participan de macro actividades, las que mas realizan especialidades, etc.</p>
                </div>
            </div><!-- /content -->

        </div><!-- /page -->

        <!--
                        End 3rd Page
        -->
        
        
        
                <!--
                        Begin Error Page
        -->
        <div data-role="page" id="error">

            <div data-role="header"><h1>Conocenos</h1>
                <div data-role="navbar" data-iconpos="bottom">
                    <ul>
                        <li><a href="#unete" data-direction="reverse" data-transition="slide" data-icon="plus">Unete!</a></li>
                        <li><a href="#clubes" data-direction="reverse" data-transition="slide" data-icon="star">Clubes</a></li>
                        <li><a href="#conocenos" data-transition="slide" data-icon="check">Conocenos</a></li>
                    </ul>
                </div>            
            </div><!-- /header -->

            <div data-role="content">
                <div data-role="content" >
                    <h2 id="tit_error">Lo Sentimos, Ha Ocurrido Un Error!</h2>
                    
                    <div data-role="collapsible">
                        <h4>Detalle de Errores</h4>
                        <ul>
                            <li>Error de conexion a la base de datos</li>
                            <li>Error de conexion a la base de datos</li>
                            <li>Error de conexion a la base de datos</li>
                        </ul>
                    </div>
                    
                </div>
            </div><!-- /content -->

        </div><!-- /page -->

        <!--
                        End Error Page
        -->
    </body>
</html>
