<?php
require_once 'inc/Consulta.php';
session_start();

if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
	$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];
} else {
	$_SESSION['referer'] = NULL;
}
$consulta = new Consulta('Mysql');

/**
 * Datos basicos de la pagina
 * @var copyright
 * @var title
 * @var descripcion
 * @var author
 */ 
$copyright = "&copy;www.ensenalia.com::".date('Y');
$title = 'English Camp '.date('Y');
$description = 'English Camp '.date('Y').' - Campamento de Inglés Urbano en Zaragoza';
$author = "Ruben Lacasa <ruben@rubenlacasa.es>";
$imgForm = 'img/summer.png';
$fechasCampus = 'Del 25 de Junio al 20 de Julio';
$edadCampus = 'Dirigido a Niños/as de 6 a 12 años';
$campus = 'english';

if ( $consulta->urlPromo( $campus, $_SESSION['referer'] ) ) {
	$_SESSION['precios'] = 'urlPromo';
	$precios = $consulta->precios['urlPromo'];
	$colegio = 'Marianistas';
	$logoPromo = "
	<div class='span12'>
		<div class='span5'>
			<img src='img/marianistas.png' alt='Colegio Nuestra Señora del Pilar - Marianistas' />
		</div>
		<div class='span5'>
			<div class='alert alert-info'>
				<h2>Inscripción Exclusiva para alumnos de Marianistas.</h2> 
				<p><em>Si no es Alumno de Marianistas inscribase haciendo clic 
				<a href='http://www.ensenalia.com/camps/english' target='_blank'>
					<strong>AQUI</strong>
				</a></em></p>
			</div>
		</div>
	</div>";
	$condicionAmigos = "* Las direcciones de los amigos no pueden ser del colegio Marianistas";
} else {
	$_SESSION['precios'] = $campus;
	$precios = $consulta->precios[$campus];
	$logoPromo = "";
	$colegio = '';
	$condicionAmigos = '';
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $title." ".$copyright; ?></title>
<meta name="description"
 content="<?php echo $description;?>">
<meta name="author" content="<?php echo $author; ?>">
<meta name="viewport" content="width=device-width">
<!-- Estilos CSS Genericos -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/flick/jquery-ui-1.8.18.custom.css">
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/jquery.Jcrop.css">
<link rel="stylesheet" href="css/prettyPhoto.css" />
<link rel="stylesheet" href="css/style.css">
<!-- Fin Estilos CSS -->
</head>
<body data-spy="scroll">
 <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> 
 <a href="http://browsehappy.com/">Upgrade to a different browser</a> or 
 <a href="http://www.google.com/chromeframe/?redirect=true">
 install Google Chrome Frame</a> to experience this site.</p><![endif]-->
 <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
   <div class="container">
    <a class="btn btn-navbar" data-toggle="collapse"
     data-target=".nav-collapse"> <span class="icon-bar"></span> 
     <span class="icon-bar"></span> <span class="icon-bar"></span>
    </a> <a class="brand" href="#"><?php echo $title; ?></a>
    <div class="nav-collapse">
     <ul class="nav">
      <li class="active"><a href="#home">Inicio</a></li>
      <li><a href="#informacion">Información Basica</a></li>
      <li><a href="#autobuses">Rutas Autobuses</a></li>
      <li><a href="#edicionesAnteriores">Ediciones Anteriores</a></li>
      <li><a href="#inscripcion">Inscripción</a></li>
     </ul>
    </div>
    <!--/.nav-collapse -->
    <div id="logo">
     <a href="http://www.ensenalia.com"> <img
      alt="Enseñalia - Pasion por enseñar" src="img/ensenalia.svg"
      width="100px" title="Ir a ensenalia.com" />
     </a>
    </div>
   </div>
   <!--/.container-->
  </div>
  <!--/.navbar-inner-->
 </div>
 <!-- Contenedor Principal
================================================== -->
<div class='container'>
    <div class='row'>
<!-- TITULAR DE LA WEB
============================ -->
        <div id='home' class='hero-unit'>
        <section>
            <header class='page-header'>
            <!-- Quitar en version final -->
                <div class='alert alert-success'>
                <p>ABIERTO PLAZO INSCRIPCIÓN <?php echo strtoupper( $title );?></p>
                </div>
           <!-- Fin aviso -->     
                <img src='<?php echo $imgForm; ?>' title='<?php echo $title; ?>' />
                <?php echo $logoPromo; ?>
                <hgroup>
                    <h3><?php echo $fechasCampus; ?></h3>
                    <h3><?php echo $edadCampus; ?></h3>
                </hgroup>
            </header>
            <div class='well'>
            <!-- TEXTO INTRODUCTORIO -->
            	<p><strong>ENGLISH camp</strong> es un completo programa de inmersión
            	en Inglés para los más jóvenes en el que aprenderán y pondrán en 
            	práctica lo aprendido con actividades, clases, talleres y 
            	deporte de una forma natural sin tener que salir al extrajero.
            	</p>
            	<p>En muchas ocasiones resulta difícil y aburrido para los más jóvenes 
            	seguir estudiando durante el periodo de vacaciones. Cada año tratamos de 
            	crear un ambiente propicio para el aprendizaje del inglés en un entorno natural 
            	en el que puedan poner en práctica todo lo aprendido en las distintas 
            	actividades, clases, talleres y deportes.</p>
 				<p>Pensando en los más jóvenes de la casa os ofrecemos un completo programa 
 				de inmersión completa en inglés (del 25 junio al 20 julio) sin necesidad de 
 				desplazarse a un país extranjero y contando con las magníficas instalaciones 
 				del Colegio Santa María del Pilar (Marianistas) en Zaragoza, 
 				de uso exclusivo para nuestros alumnos durante todo el campus.</p>
 				<p>Contamos con la experiencia de un variado grupo de profesores 
 				de habla inglesa (Estados Unidos, Escocia o Gales) que con su entusiasmo 
 				y dedicación, harán que los chavales aprendan y disfruten. 
 				Esta diversidad cultural va a contribuir a que nuestros chavales 
 				practiquen y aprendan inglés al mismo tiempo que conocen la cultura 
 				de estos países. Son gente joven y dinámica con amplia experiencia 
 				que motivarán a los niños para que puedan poner en práctica todo lo 
 				aprendido en las distintas actividades. Esperamos que aprendan a 
 				disfrutar usando el idioma inglés de una forma divertida y natural.</p>
                    <a class="btn btn-primary btn-large" data-toggle="collapse"
                        data-target="#readmore">Leer Mas &raquo;</a>
                </p>
                <div id="readmore" class="collapse on">
                    <section>
                        <hgroup class='alert alert-info '>
                            <h2 class='alert-heading'>
                            LEARN ENGLISH, MAKE FRIENDS AND ENJOY THE ACTIVITIES<br/>
                            <em>APRENDE INGLÉS, HAZ AMIGOS Y DISFRUTA CON LAS ACTIVIDADES</em>
                            </h2>
                        </hgroup>
                        <div>
                            <div class='span10'>
                            <h3>Morning Lessons:</h3>
                            <p>Las clases están especialmente diseñadas para niños de 6 a 12 años.
                            En el <strong>ENGLISH camp</strong> trabajamos en pequeños grupos, a través
                            de proyectos, promoviendo la interacción entre los niños.</p>
                            <h3>Morning Activities:</h3>
                            <p>Aprenderemos a poner en práctica el inglés a través de otras actividades
                            en el exterior como el tenis, la natación, olimpiadas o deportes ingleses,
                            lo cual posibilitará el aprendizaje del idioma de una manera divertida.</p>
                            <h3>Afternoon activities:</h3>
                            <p>Talleres de manualidades, música, teatro, etc..., dónde aprenderán a 
                            expresarse y a desarrollar su creatividad e imaginación.</p>
                            	
                            </div>
                        </div>
                    </section>
                </div>
        </div>
     </section>
     </div>
<!-- INFORMACION BASICA 
============================ -->
     
        <div >
            <section>
                <div class='span12' id='informacion'>
                    <header class='page-header'>
                        <h2>Información Basica</h2>
                    </header>
                </div>
           <!-- PROGRAMA DIARIO -->
                <div class='span12'>
                    <header>
                        <h3>Programa diario</h3>
                    </header>
                    <div>
                        <p>Nuestro programa esta pensado para que los niños se lo pasen
                        bien a la vez que aprenden inglés</p>
                        <p>Nuestro programa se desarrollara en el siguiente horario:<br/> 
                        Lunes a Viernes de 8:30 a 18:00.
                        </p>
                        <p>
                            <a class="btn btn-info" data-toggle="collapse" data-target="#programa">
                            Ver Programa &raquo;</a>
                        </p>
                        <div id='programa' class='collapse on'>
                            <div class='well span6'>
                                <img src='http://www.ensenalia.com/sites/default/files/userfiles/horario.png' alt='Programa Diario' />
                            </div>
                            <div class='span5'>
                            	<img src='http://www.ensenalia.com/sites/default/files/imagecache/ampliacion/P6210002_0.jpg' alt='Programa Diario' />
                            </div>
                        </div>
                    </div>
                    
                </div>
            <!-- INSTALACIONES -->
                <div class='span12'>
                    <header>
                        <h3>Instalaciones</h3>
                    </header>
                    <div>
                        <p>
                          El <strong><?php echo $title; ?></strong>se realizara en el Colegio Santa María 
                          del Pilar - Marianistas, situado en Paseo Reyes de Aragón 5 - 50012 - Zaragoza. 	
                        </p>
                        <p>
                            <a id='verInstalaciones' class="btn btn-info" data-toggle="collapse" data-target="#ubicacion">
                            Ver Instalaciones &raquo;</a>
                        </p>
                    </div>
                     <div id='ubicacion' class='collapse on'>
                     	<div class='well span6'>	
                     		<div id="map_canvas"></div>
                     	</div>
                     	<div class='span5'>
                     		<img src='http://www.ensenalia.com/sites/default/files/imagecache/detalle/DSC02976.JPG' alt='Instalaciones' />
                     		<img src='http://www.ensenalia.com/sites/default/files/imagecache/detalle/DSC02992.JPG' alt='Instalaciones' />
                     	</div>
                    </div>
                    
                </div>
                <!-- PRECIOS -->
                <div class='span12'>
                	<header>
                		<h3>Precio</h3>
                	</header>
                	 <div>
                        <p>Los precios estan divididos por las semanas de inscripción al <strong>English
                        Camp 2012</strong>. Los precios incluyen: Servicio de comedor, camiseta
                        del campamento, material didáctico, seguro de responsabilidad
                        civil, enseñanza y todas las actividades.</p>
                        
                        <div id='precios'>
                          <div class="well span6">
                           <table class='table table-striped table-condensed'>
                            <thead>
                             <tr>
                              <th>Duración</th>
                              <th>Precio</th>
                             </tr>
                            </thead>
                            <tbody>
                             <tr>
                              <td>1 Semana</td>
                              <td><?php echo $precios['1']; ?>€</td>
                             </tr>
                             <tr>
                              <td>2 Semanas</td>
                              <td><?php echo $precios['2']; ?>€</td>
                             </tr>
                             <tr>
                              <td>3 Semanas</td>
                              <td><?php echo $precios['3']; ?>€</td>
                             </tr>
                             <tr>
                              <td>4 Semanas</td>
                              <td><?php echo $precios['4']; ?>€</td>
                             </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                <td colspan='2'>
                                 <p>
                                     <em>10% de Descuento para Familias Numerosas</em>
                                 </p>
                                 <p>
                                     <em>10 % de Descuento Plan Amigos ( 5 minimo )</em>
                                 </p>
                                 <p>
                                     *Descuentos no Acumulables
                                 </p>
                                 <p>
                                  <em>Precio del autobus NO INCLUIDO</em>
                                 </p>
                                 <p>
                                 <em>Consultar precios para hermanos de 3 a 6 años</em>
                                 </p>
                                </td>
                               </tr>
                           </tfoot>
                        </table>
                      </div>
                    </div>
                    </div>
                	
                </div>
                
                
            </section>
        </div>
     
<!-- RUTAS DE AUTOBUSES
============================ -->
     
        <div >
            <section>
                <div class='span12' id='autobuses'>
                    <header class='page-header'>
                        <h2>Rutas de Autobuses</h2>
                    </header>
                </div>
                <div class='span5'>
                    <header>
                        <h3>Ruta 1</h3>
                        <p><em>Pº Sagasta - Plz Aragón - Coso - C. Alierta - 
                        Cº Las Torres - Pº Colón / Ruiseñores
                        </em></p>
                        <p>
                        <a id='verRuta1' class="btn btn-info verRuta" data-toggle="collapse"
                        data-target="#ruta1">Ver Ruta 1 Detallada &raquo;</a>
                        </p>
                    </header>
                    <div id="ruta1" class='collapse on'>
                        <div class='well'>
                            <table class='table table-striped table-condensed'>
                            <thead>
                             <tr>
                              <th>Parada</th>
                              <th>IDA</th>
                              <th>VUELTA</th>
                             </tr>
                            </thead>
                            <tbody id='detalleRuta1'>
                            <!-- Detalle generado bajo demanda -->
                            </tbody>
                            <tfoot>
                             <tr>
                              <td colspan='3'><em>*Esta información esta sujeta
                                a cambios</em></td>
                             </tr>
                            </tfoot>
                           </table>
                          </div>
                         </div>
                </div>
                <div class='span5'>
                    <header>
                        <h3>Ruta 2</h3>
                        <p><em>Plz. Mozart - S.Allende - Mª Zambrano - 
                        Gómez de Avellaneda - Pº Mª Agustin - Plz San Francisco - 
                        Condes de Aragón - Gomez Laguna - Avd. Ilustración</em>
                        <p>
                        <a id='verRuta2' class="btn btn-info verRuta" data-toggle="collapse"
                        data-target="#ruta2">Ver Ruta 2 Detallada &raquo;</a>
                        </p>
                    </header>
                    <div id="ruta2" class='collapse on'>
                     <div class='well'>  
                     <table class='table table-striped table-condensed'>
                      <thead>
                       <tr>
                        <th>Parada</th>
                        <th>IDA</th>
                        <th>VUELTA</th>
                       </tr>
                      </thead>
                      <tbody id='detalleRuta2'>
  					  <!-- Detalle generado bajo demanda -->
                      </tbody>
                      <tfoot>
                       <tr>
                        <td colspan='3'><em>*Esta información esta sujeta
                          a cambios</em></td>
                       </tr>
                      </tfoot>
                     </table>
                     </div> 
                    </div>
                </div>
            </section>
        </div>
    
<!-- EDICIONES ANTERIORES 
============================ -->
    
        <div >
            <section>
                <div class='span12' id='edicionesAnteriores'>
                    <header class='page-header'>
                        <h2>Ediciones Anteriores</h2>
                    </header>
                </div>
                <div class='span12'>
                    <header>
                        <h3>Videos</h3>
                        <p>
                        <em>Videos del Football &amp; English Camp</em>
                        </p>
                    </header> 
                    <div id="myCarousel" class='span10' style="height:540px;overflow:scroll">
                    <a href="http://youtu.be/JHN8Dw3XbrM" rel="prettyPhoto" title="English Camp Zaragoza 2011">
                    	<img src="http://img.youtube.com/vi/JHN8Dw3XbrM/0.jpg" class="cloudcarousel" alt="" title="English Camp Zaragoza 2011"/>
                    </a>
                    <a href="http://youtu.be/HN-MsJpazhw" rel="prettyPhoto" title="English Summer Day Camp 2010 ">
                    	<img src="http://img.youtube.com/vi/HN-MsJpazhw/0.jpg" class="cloudcarousel" alt="" title="English Summer Day Camp 2010 "/>
                    </a>
                   
                     <!-- Define left and right buttons. -->
        			<input id="left-but"  class='carousel-control left' type="button" value="&lt;" />
        			<input id="right-but" class='carousel-control right' type="button" value="&gt;" />
        			<!-- Define elements to accept the alt and title text from the images. -->
        			<p id="title-text">Aqui el title text</p>
        			<p id="alt-text">Aqui el alt text</p>                  
                    </div>
                </div>
            </section>
        </div>
    
<!-- FORMULARIO DE INSCRIPCION 
============================ -->
     <form id='formularioInscripcion' method='post' action='inscripcion.php' enctype="multipart/form-data">
        <div >
            <section>
                <div class='span12' id='inscripcion'>
                    <header class='page-header'>
                        <h2>Formulario de Inscripción</h2>
                    </header>
                </div>
                <div class='span6'>
                    <header>
                        <h3>Datos del Participante</h3>
                        <p>
                            <em>Rellene los siguientes campos con los datos del
                            participante</em>
                        </p>
                        <p>
                            <em>
                            <strong>Los campos marcados con * son obligatorios</strong>
                            </em>
                    </header>
                    <div class='well'>
                    	<input type='hidden' name='campus' value='<?php echo $campus; ?>' readonly />
                        <label>*Nombre:</label> 
                        <input type="text" name='nombreParticipante' class="span4 required" placeholder="Nombre del Participante">
                        <label>*Apellidos:</label> 
                        <input type="text" name='apellidosParticipante' class="span4 required" placeholder="Apellidos del Participante">
                        <div class="control-group">
                            <label class="control-label" for="optionsCheckbox">*Sexo:</label>
                            <div class="controls">
                                <label class="radio inline"> 
                                <input type="radio" id="sexo" name="sexoParticipante" value="masculino">
                                Masculino
                                </label> 
                                <label class="radio inline"> 
                                <input type="radio" id="sexo" name="sexoParticipante" value="femenino">
                                Femenino
                                </label>
                            </div>
                        </div>
                        <label>*Fecha de Nacimiento:</label> 
                        <input type="text" id='fechaParticipante' name='fechaParticipante' class="span2 required campoFecha" placeholder="dd/mm/aaaa">
                        <label>*Dirección:</label> 
                        <input type="text" name='direccionParticipante' class="span4 required" placeholder="Direccion del Participante">
                        <label>*Codigo Postal:</label> 
                        <input type="text" name='cpParticipante' class="span1 required" placeholder="CP"> 
                        <label>*Ciudad:</label>
                        <input type="text" name='ciudadParticipante' class="span3 required" placeholder="Ciudad"> 
                        <label>*Teléfono Principal de Contacto:</label> 
                        <input type="text" name='tel1Participante' class="span2 required" placeholder="Teléfono Principal"> 
                        <label>Teléfono Secundario de Contacto:</label> 
                        <input type="text" name='tel2Participante' class="span2" placeholder="Teléfono Secundario"> 
                        <label>*Correo Electronico:</label> 
                        <input type="text" name='emailParticipante' class="span4 required email" placeholder="email"> 
                        <label>*Colegio:</label> 
                        <input type="text" name='colegioParticipante' class="span4 required" placeholder="Colegio del Participante" value="<?php echo $colegio;?>"> 
                        <label>*Curso Escolar:</label> 
                        <select name='cursoParticipante' class='required'>
                        	<option value='0'>- Seleccionar Curso -</option>
                        	<option value='1 Primaria'>1&deg; Primaria</option>
                        	<option value='2 Primaria'>2&deg; Primaria</option>
                        	<option value='3 Primaria'>3&deg; Primaria</option>
                        	<option value='4 Primaria'>4&deg; Primaria</option>
                        	<option value='5 Primaria'>5&deg; Primaria</option>
                        	<option value='6 Primaria'>6&deg; Primaria</option>
                        	<option value='1 ESO'>1&deg; ESO</option>
                        	<option value='2 ESO'>2&deg; ESO</option>
                        	<option value='3 ESO'>3&deg; ESO</option>
                        	<option value='4 ESO'>4&deg; ESO</option>
                        </select>
                        <div class="control-group">
                            <label class="control-label" for="optionsCheckbox">
                            *Número de hermanos (sin incluir el participante):
                            </label>
                            <div class="controls">
                                <label class="radio inline"> 
                                <input type="radio" id="numeroHermanos" name="hermanosParticipante" value="0" checked>
                                0
                                </label> 
                                <label class="radio inline"> 
                                <input type="radio" id="numeroHermanos" name="hermanosParticipante" value="1">
                                1
                                </label> 
                                <label class="radio inline"> 
                                <input type="radio" id="numeroHermanos" name="hermanosParticipante" value="2">
                                2
                                </label> 
                                <label class="radio inline"> 
                                <input type="radio" id="numeroHermanos" name="hermanosParticipante" value="3">
                                3
                                </label> 
                                <label class="radio inline"> 
                                <input type="radio" id="numeroHermanos" name="hermanosParticipante" value="+3">
                                +3
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="optionsCheckbox">
                            Años que ha estudiado inglés:
                            </label>
                            <div class="controls">
                                <label class="radio inline"> 
                                <input type="radio" id="estudioIngles" name="inglesParticipante" value="0" checked>
                                0
                                </label> 
                                <label class="radio inline"> 
                                <input type="radio" id="estudioIngles" name="inglesParticipante" value="1">
                                1
                                </label> 
                                <label class="radio inline"> 
                                <input type="radio" id="estudioIngles" name="inglesParticipante" value="2">
                                2
                                </label> 
                                <label class="radio inline"> 
                                <input type="radio" id="estudioIngles" name="inglesParticipante" value="3">
                                3
                                </label> 
                                <label class="radio inline"> 
                                <input type="radio" id="estudioIngles" name="inglesParticipante" value="+3">
                                +3
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">
                            Fotografia del Participante:
                            <em>La fotografia se redimensionara a 150px de ancho. Formatos:jpeg,jpg,png,bmp,gif</em>
                            </label>
                            <div class="controls">
                            	<input type='button' id='upload' class='btn btn-info' value='Seleccionar Fotografia'>
								<input type='hidden' id='imgOri' name='imgOri'>
								<input type='hidden' id='imgNew' name='imgNew' class='requiered' name="fotoParticipante">
								<div id='dialog'></div>
								<div id='foto'></div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="comentarios">Comentarios:</label>
                            <div class="controls">
                                <textarea class="input-xlarge mensaje" id="comentarios" name='comentariosParticipante' rows="5" 
                                placeholder='En caso de ser familia numerosa indique el numero aqui' 
                                title='En caso de ser familia numerosa indique el numero aqui'></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class='span6'>
                    
                        <header>
                            <h3>Persona de Contacto</h3>
                            <p>
                                <em>Introduzca los datos de la persona de contacto</em>
                            </p>
                            <p>
                                <em><strong>Los campos marcados con * son obligatorios</strong></em>
                            </p>
                        </header>
                        <div class='well'>
                            <label>*Nombre:</label> 
                            <input type="text" name='nombreContacto' class="span4 required" placeholder="Nombre de la Persona de Contacto"> 
                            <label>*Apellidos:</label>
                            <input type="text" name='apellidosContacto' class="span4 required" placeholder="Apellidos de la Persona de Contacto">
                            <label>*Movil/Telefono:</label>
                            <input type="text" name='movilContacto' class="span2 required" placeholder="Movil de la Persona de Contacto">
                        </div>
                   
                    
                    <!-- DATOS MEDICOS -->
                        <header>
                            <h3>Datos Médicos</h3>
                            <p>
                                <em>Introduzca los datos medicos indicados a continuación</em>
                            </p>
                        </header>
                        <div class='well'>
                            <label>*Alergias Conocidas:</label> 
                            <input type="text" name='alergiasMedicos' class="span4 mensaje required" placeholder="Alergias conocidas"
                                title="Indique las alergias conocidas que pueda padecer el participante, en caso contrario escriba 'No tiene'">
                            <label>*Condiciones médicas especiales:</label> 
                            <input type="text" name='condicionesMedicos' class="span4 mensaje required" placeholder="Condiciones médicas especiales"
                                title="Indique las condiciones médicas que pueda necesitar el participante, en caso contrario escriba 'No tiene'">
                            <label>*Tratamiento médico:</label> 
                            <input type="text" name='tratamientoMedicos' class="span4 mensaje required" placeholder="Tratamiento médico"
                                title="Indique si el participante esta bajo tratamiento médico o necesita algun tratamiento
                                médico en especial, en caso contrario escriba 'No tiene'">
                            <label>*Dieta Especial:</label> 
                            <input type="text" name='DietaMedicos' class="span4 mensaje required" placeholder="Dieta Especial"
                                title="Indique si el participante debe seguir alguna dieta especial, en caso contrario escriba 'No tiene'">
                        </div>
                    
                    <!-- DATOS PADRE/MADRE -->
                        <header>
                            <h3>Padres o Tutores Legales</h3>
                            <p>
                                <em>Introduzca los datos de los padres o tutores legales del participante</em>
                            </p>
                        </header>
                        <div class='well'>
                            <h4>Datos del Padre / Tutor Legal</h4>
                            <label>Nombre:</label> 
                            <input type="text" name='nombrePadre' class="span4" placeholder="Nombre del Padre/Tutor"> 
                            <label>Apellidos:</label>
                            <input type="text" name='apellidoPadre' class="span4" placeholder="Apellidos del Padre/Tutor"> 
                            <label>Móvil:</label>
                            <input type="text" name='movilPadre' class="span4" placeholder="Numero Movíl"> 
                            <label>Correo Electronico:</label> 
                            <input type="text" name='emailPadre' class="span4 email" placeholder="Email">
         
                            <h4>Datos de la Madre / Tutora Legal</h4>
                            <label>Nombre:</label> 
                            <input type="text" name='nombreMadre' class="span4" placeholder="Nombre de la Madre/Tutora">
                            <label>Apellidos:</label> 
                            <input type="text" name='apellidoMadre' class="span4" placeholder="Apellidos de la Madre/Tutora"> 
                            <label>Móvil:</label>
                            <input type="text" name='movilMadre' class="span4" placeholder="Numero Movíl"> 
                            <label>Correo Electronico:</label> 
                            <input type="text" name='emailMadre' class="span4 email" placeholder="Email">
                            <input type="hidden" name='guarderia' value='No' />
                        </div>
                </div>
                
<!-- SECCION DE LAS OPCIONES DEL CAMPAMENTO  -->
                	 <div class='span12'>
                    <header>
                        <h3>Fechas De Campamento:</h3>
                        <p>
                            <em>Señale las semanas que se desea contratar</em>
                        </p>
                    </header>
                    </div>
                    <div class='span6'>
                        <div class='alert alert-info'>
                            <h4>Semana: 25 de Junio al 29 de Junio</h4>
                            <label class="checkbox"> 
                                <input type="checkbox" class='semanaCampus' id="1semana" name="semana1Campus" value="Si">
                                Marcar para 1ª Semana
                            </label>
                        </div>  
                        <div class="alert alert-info">
                            <h4>Semana: 9 de Julio al 13 de Julio</h4>
                            <label class="checkbox"> 
                                <input type="checkbox" class='semanaCampus' id="3semana" name="semana3Campus" value="Si">
                                Marcar para 3ª semana
                            </label>
                        </div>
                    </div>
                    
                    <div class='span6'>
                        <div class="alert alert-info">
                            <h4>Semana: 2 de Julio al 8 de Julio</h4>
                            <label class="checkbox"> 
                                <input type="checkbox" class='semanaCampus' id="2semana" name="semana2Campus" value="Si">
                                Marcar para 2ª semana
                            </label>
                        </div>
                        <div class="alert alert-info">
                            <h4>Semana: 16 de Julio al 20 de Julio</h4>
                            <label class="checkbox"> 
                                <input type="checkbox" class='semanaCampus' id="4semana" name="semana4Campus" value="Si">
                                Marcar para 4ª semana
                            </label>
                        </div>
                    </div>
                    
                    <div class='span12'>
                       <div class='alert alert-info'>
                        <h3>Servicio De Autobus</h3>
                            <h4>¿Desea contratar el servicio de autobús para el campamento?</h4>
                            <em>El precio del autobus tiene un coste adicional de 25€ por semana</em>
                        <label class="checkbox">
                            <input type="checkbox" id="servicioAutobus" name="servicioAutobus" value="Si"> 
                            Marcar para contratar el servicio de autobús
                        </label>
                        <em>*Si contrata el servicio de autobus debe especificar la ruta de ida
                            y la ruta de vuelta asi como la parada tanto de ida como de vuelta</em>
                        </div>
                    </div>    
                         <!-- Seccion de la seleccion de rutas de autobus -->
                   		<div class='span6 rutas'>
                   			<div class='alert alert-info'>
                        	<header>
                            	<h5>*Ruta Ida:</h5>
                        	</header>
                        	<div class="controls">
                            	<label class="checkbox inline"> 
                                	<input type="radio"  name="rutaIda" id='ruta1Ida' value="Ruta1">
                                	Ruta 1
                            	</label> 
                            	<label class="checkbox inline"> 
                                	<input type="radio"  name="rutaIda" id='ruta2Ida' value="Ruta2">
                                	Ruta 2
                            	</label>
                        	</div>
                        	<label>Parada:</label> 
                        		<select id='nombreParadaIda' name='paradaIda' class='span5 required'></select>
                        	</div>
                        </div>
                        <div class='span6 rutas'>
                    	<div class='alert alert-info'>
                        	<header>
                            	<h5>*Ruta Vuelta:</h5>
                        	</header>
                        	<div class="controls">
                            	<label class="checkbox inline"> 
                                	<input type="radio"  name="rutaVuelta" id='ruta1Vuelta' value="Ruta1">
                                	Ruta 1
                            	</label> 
                            	<label class="checkbox inline"> 
                                	<input type="radio"  name="rutaVuelta" id='ruta2Vuelta' value="Ruta2">
                                	Ruta 2
                            	</label>    
                        	</div>
                        	<label>Parada:</label>
                        		<select id='nombreParadaVuelta' name='paradaVuelta' class='span5 required'></select>
                        </div>
                    	</div>
                    
                                  
                    
                    
                    <!-- Muestra la seccion del codigo promocional -->
                    <div class='span12'>
                    	<div class='alert alert-info'>
                    		<h4>Codigo Promocional</h4>
                    		<p><em>*Si dispone de codigo promocional escribalo aqui. El codigo promocional solo se aplica
                    		al precio de la Inscripción del Campus</em></p>
                    		<p><em>*Si el codigo es de la promocion amigos este se aplicara cuando se alcanze el numero minimo para
                    		la promoción. En el momento de alcanzarse se comunicara</em></p>
                    		<input type='text' id='codigoDescuento' name='codigoDescuento' placeholder='Codigo Promocional' />
                    		<input type='button' class='btn btn-success' id='aplicarDescuento' value='Aplicar Codigo' />
                    		<input type='button' class='btn btn-danger' id='noaplicarDescuento' value='Quitar Codigo' />
                    		<span id='mensajeDescuento'></span>
                    	</div>
                    </div>
                    
                   
                   
                <!-- Muestra el total de la inscripción segun lo que se ha contratado -->
                    <div class='span12'>
                    	<div class='alert alert-success'>
                    		<p><span class='totalInscripcion'>Total Inscripción:</span><span id='totalInscripcion'></span></p>
                    	</div>
                    </div>
                <!-- Plan amigos -->        
                <div class='span12' id='planAmigos'>
                	<header>
                		<h3>Invita a 4 o mas de tus amigos y conseguid y precio especial</h3>
                		<p><em>
                			* Si 4 o mas de tus amigos se inscriben en el campus conseguireis un descuento de 20€ en 
                			vuestra inscripción
                		</em></p>
                		<p><em>
                			* Los descuentos no son acumulables
                			<?php echo "<br/>".$condicionAmigos; ?>
                		</em></p>
                	</header>
                	<div id='emailsAmigos' class='well'>
                		<input type='hidden' id='totalEmails' value='4' />
                		<p><label class='inline'>Introduzca el email de un amigo:</label>
                		<input class='control-label email' type='text' name='amigos[0]' /></p>
                		<p><label class='inline'>Introduzca el email de un amigo:</label>
                		<input class='control-label email' type='text' name='amigos[1]' /></p>
                		<p><label class='inline'>Introduzca el email de un amigo:</label>
                		<input class='control-label email' type='text' name='amigos[2]' /></p>
                		<p><label class='inline'>Introduzca el email de un amigo:</label>
                		<input class='control-label email' type='text' name='amigos[3]' /></p>
                		<p><em>Si quieres invitar a mas amigos has clic en el botón <strong>Agregar Email Amigo</strong>
                		 tantas veces como emails de amigos quieras agregar</em></p>
                		<input type='button' class='btn btn-info masAmigos' value='+ Agregar Email amigo' /> 
                	</div>
                </div>    
                <div class='span12'>
                	<header>
                		<h3>¿Como nos ha conocido?</h3>
                	</header>
                	<div class='well'>
                		<select id='conocido' name='conocido'>
                			<option value='0'> - Seleccione una Opcion -</option>
                			<option value='Aragonia'>Enseñalia Aragonia</option>
                			<option value='Gran Via'>Enseñalia Gran Via</option>
                			<option value='Rosales'>Enseñalia Rosales</option>
                			<option value='Marianistas'>Colegio marianistas</option>
                			<option value='Publicidad'>Publicidad</option>
                			<option value='Buscador'>Buscador Web</option>
                			<option value='Amigos'>Amigos</option>
                			<option value='Ya nos conocia'>Ya nos conocia</option>
                			<option value='Otros'>Otros</option> 
                		</select>
                	</div>
                </div>
                <div class='span12'>
                	<header>
                		<h3>¿Donde se ha informado?</h3>
                	</header>
                	<div class='well'>
                		<select id='informado' name='informado'>
                			<option value='0'> - Seleccione una Opcion -</option>
                			<option value='Aragonia'>Enseñalia Aragonia</option>
                			<option value='Gran Via'>Enseñalia Gran Via</option>
                			<option value='Rosales'>Enseñalia Rosales</option>
                			<option value='Marianistas'>Colegio marianistas</option>
                			<option value='Publicidad'>Publicidad</option>
                			<option value='Buscador'>Buscador Web</option>
                			<option value='Amigos'>Amigos</option>
                			<option value='Ya nos conocia'>Ya nos conocia</option>
                			<option value='Otros'>Otros</option> 
                		</select>
                	</div>
                </div>    
                <div class='span12'>
                    <header>
                        <h3>Condiciones Generales del <?php echo $title; ?></h3>
                        <p><em>Lea con detenimiento las condiciones del campus</em></p>
                    </header>
                    <div class='well'>
                        <div class='help-block'>
                            <h4>Derecho de admisión</h4>
                            <p>Reservado el derecho de admisión y de expulsión del
                             campus si la organización lo considera oportuno.</p>
                            <h4>Utilización de la imagen de los consumidores</h4>
                            <p>Enseñalia, se reserva el derecho a utilizar las fotos y
                             otros materiales que la organización realice, como material de
                             publicidad siempre que no exista oposición expresa previa por
                             parte del consumidor. No obstante, la autorización tácita a la
                             que nos referimos será revocable en cualquier momento por el
                             consumidor, pero habrán de indemnizarse, en su caso, los daños
                             y perjuicios causados a Enseñalia.</p>
                            <h4>Protección de datos de carácter personal</h4>
                            <p>
                             En cumplimiento de lo dispuesto en la Ley Orgánica 15/1999, de
                             13 de diciembre, de Protección de datos de carácter Personal,
                             Enseñalia le informa que sus datos personales contenidos en
                             estas condiciones generales, serán incorporados a un fichero
                             (cuyo responsable y titular es Dx Computer S.L. para las
                             finalidades comerciales y operativas de Enseñalia. La
                             aceptación de estas condiciones generales, implica su
                             consentimiento para llevar a cabo dicho tratamiento, y para su
                             uso con dichas finalidades. Asimismo, le informamos de la
                             posibilidad de ejercitar los derechos de acceso, rectificación
                             y cancelación en los términos establecidos en la legislación
                             vigente, mediante comunicación a la siguiente dirección: Gran
                             Vía, 29 – 50006, indicando como destinatario al responsable de
                             Calidad o a la dirección de correo electrónico: <a
                              href='mailto:calidad@ensenalia.com'>calidad@ensenalia.com</a>.
                   
                            
                            <h4>Responsabilidades del Participante</h4>
                            <p>Todo participante que no cumpla las normas de la
                             escuela, o moleste a la organización u a otros alumnos con un
                             comportamiento indisciplinado, será reenviado a su domicilio,
                             corriendo sus padres con los gastos del traslado. En este
                             caso, la decisión del director del campamento de verano es
                             inapelable. Igualmente, el cliente responderá de los daños
                             causados en el material o instalaciones. Cualquier enfermedad,
                             ya sea infecciosa o no, deberá comunicarse al campamento con
                             antelación suficiente para que esta pueda examinar el caso,
                             reservándose en cualquier caso el derecho de admisión al
                             programa, si considera que la estancia del participante pueda
                             suponer un riesgo para el resto de los participantes.
                             Asimismo, y para el estudio de estos casos, deberá aportarse
                             toda la documentación que el médico estime oportuna para el
                             buen criterio del mismo.</p>
                            <h4>Perdida de Material u Objetos del Participante</h4>
                            <p>LA DIRECCIÓN DEL CAMPAMENTO NO SE HACE RESPONSABLE DE
                             LAS PÉRDIDAS DE OBJETOS QUE LLEVEN LOS NIÑOS (CÁMARAS DE
                             FOTOS, ROPA, ETC.)</p>
                        </div>
                    </div>
                </div>
                
                <div class='span12'>
                    <div class='alert alert-info'>
                    <div class="controls">
                        <label class="checkbox inline"> 
                            <input type="checkbox" id="condiciones" name="condicionesAceptadas" value="Si" class='required'>
                            <strong>* Haciendo clic en esta casilla manifiesta que ha leido y acepta
                            las condiciones del <?php echo $title; ?></strong><br/>
                            <strong>* Es importante que revise los campos marcados con * para comprobar que esta todo correcto</strong>
                        </label> 
                    </div>
                    <br/>
                    <input id='botonAceptar' class='btn btn-success btn-large' type='submit' value='Realizar Inscripcion en Campus'>
                    </div>
                </div>
                <div class='span12'>
                    <div class='error alert alert-error' style='display:none;'>
                    <header>
                        <h4>¡¡¡ Atención !!!</h4>
                    </header>
                    <span></span>.<br clear="all" />
                    </div>
                </div>
               </section>
              </div>
        </form>
     </div>
     
<!-- PIE DE LA WEB 
============================ -->   
     <hr>
     <div class='span12'>
        <footer>
            <p><a href='http://www.ensenalia.com' target='_blank'>&copy; Enseñalia <?php echo date('Y'); ?></a> - 
            <a href='mailto:info@ensenalia.com'>info@ensenalia.com</a> - 
            902 636 096</p>
            <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/">
            <img alt="Licencia de Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" /></a>
            
        </footer>
     </div>
</div>
<!-- FIN  -->
<!-- SCRIPTS GENERICOS -->
 <script
  src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 <script>
		window.jQuery
				|| document
						.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>');
 </script>
 <script src="js/libs/jquery-ui-1.8.18.custom.min.js"></script>
 <script src="js/libs/cloud-carousel.1.0.5.min.js"></script>
 <script src="js/libs/jquery.prettyPhoto.js"></script>
 <script src="js/libs/bootstrap/transition.js"></script>
 <script src="js/libs/bootstrap/collapse.js"></script>
 <script src="js/libs/bootstrap/scrollspy.js"></script>
 <script src="js/libs/bootstrap/tooltip.js"></script>
 <script src="js/libs/jquery.validate.min.js"></script>
 <script src="js/libs/additional-methods.min.js"></script>
 <script src="js/plugins.js"></script>
 <script src="http://maps.google.com/maps/api/js?libraries=geometry&sensor=false"></script>
 <script src="js/script.js"></script>
<!-- FIN SCRIPTS GENERICOS --> 
<script>
	$( window ).load( miCarousel );
	$('document').ready( complementosIniciales );
		// 	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		// 	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		// 	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		// 	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>