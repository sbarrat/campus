<?php 
require_once 'inc/Consulta.php';
session_start();
$_SESSION['referer'] = $_SERVER['HTTP_REFERER']; 
$consulta = new Consulta('Mysql');
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Football &amp; English Camp 2012 - &copy;www.ensenalia.com 2012</title>
<meta name="description"
 content="Football & English Camp 2012 Campamento de Futból e Inglés para niños">
<meta name="author" content="Ruben Lacasa">
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
     data-target=".nav-collapse"> <span class="icon-bar"></span> <span
     class="icon-bar"></span> <span class="icon-bar"></span>
    </a> <a class="brand" href="#">Football &amp; English Camp 2012</a>
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
                <div class='alert alert-error'>Pagina en Desarrollo -
                    Los datos que aparecen no son definitivos y el formulario no esta habilitado
                    <?php echo date('d/m/Y'); ?>
                </div>
           <!-- Fin aviso -->     
                <img src='img/football12.png' title='Football & English Camp 2012' />
                <hgroup>
                    <h1>FOOTBALL &amp; ENGLISH camp 2012</h1>
                    <h2>Campus deportivo para jóvenes</h2>
                    <h3>Del 2 al 13 de Julio en Villanueva de Gállego</h3>
                    <h3>De 7 a 14 años</h3>
                </hgroup>
            </header>
            <div class='well'>
            	<p>ABADSPORT y ENSEÑALIA realizan este año el 
            	III Campus Football &amp; English, bajo la inquietud de superarnos 
            	año tras año, con el reto de conseguir la diversión y aprendizaje 
            	de nuestros alumnos para la tranquilidad de los padres. 
            	Siempre bajo nuestra filosofía de fusionar la mejor preparación 
            	deportiva con el aprendizaje de un idioma.</p>
 				<p>Vive una experiencia inolvidable con multitud de actividades 
 				lúdicas, deportivas y educativas que ayudarán a enriquecer el 
 				desarrollo integral de los niños y niñas en una edad importante. 
 				Contamos con unas instalaciones únicas en Aragón, 
 				en Villanueva de Gallego. Equipadas con todo lo necesario 
 				para realizar unas actividades pensadas para los jóvenes. 
 				Football &amp; English cuenta con la dirección de Javier Abad, 
 				Agente FIFA y entrenador nacional.
            	</p>
            	<h2>Dirigido a</h2>
            	<p>&raquo; <em>Niños y niñas de 7 a 14 años que quieran desde el entretenimiento y 
                            	la diversión mejorar sus conocimientos técnicos de fútbol 
                            	y aumentar sus conocimientos de ingles.</em></p>
                <p>&raquo; <em>Servicio de Guardería: de 3 a 6 años, dirigida a dar un servicio especial a 
								los hermanos menores de los inscritos en el campus.</em></p>
                <p>
                    <a class="btn btn-primary btn-large" data-toggle="collapse"
                        data-target="#readmore">Leer Mas &raquo;</a>
                </p>
                <div id="readmore" class="collapse on">
                    <section>
                        <hgroup class='alert alert-info '>
                            <h2 class='alert-heading'>Objetivos</h2>
                        </hgroup>
                        <div>
                            <div class='span10'>
                            <p>&raquo; <em>Aprender a comunicarse en inglés a través del fútbol.</em></p>
                            	<p>&raquo; <em>Desarrollar nuevas cualidades técnicas y tácticas.</em></p>
                            	<p>&raquo; <em>Conocer nuevos amigos y compañeros, en unas especiales "vacaciones"</em></p>
                            
                            	<h3>Objetivos socio-educativos</h3>
                            	<p>&raquo; <em>Fomentar la convivencia, cooperación e interacción entre los participantes a
                            	través de la práctica del deporte.</em></p>
                            	<p>&raquo; <em>Promover valores como amistad, autoestima, tolerancia y juego limpio, 
                            	repercutiendo positivamente en el desarrollo de la persona.</em></p>
                            	<p>&raquo; <em>Acercar el inglés a la vida cotidiana a través del deporte.</em></p>
                           
                            	<h3>Objetivos deportivos</h3>
                            	<p>&raquo; <em>Desarrollar el aprendizaje mediante un sistema de entrenamiento global e 
                            	integral a través del juego.</em></p>
                            	<p>&raquo; <em>Resolver situaciones técnico-tácticas incidiendo en la importancia de 
                            	la toma de decisiones en el deporte.</em></p>
                            	<p>&raquo; <em>Realizar actividad física adquiriendo valores de estilo de vida saludables.</em></p>
                            	<p>&raquo; <em>Trabajos especificos para porteros con técnicos especialistas.</em></p>	
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
                <div class='span12'>
                    <header>
                        <h3>Programa diario</h3>
                    </header>
                    <div>
                        <p>Nuestro programa esta pensado para que los niños se lo pasen
                        bien a la vez que aprenden inglés, combinando el fútbol con el aprendizaje del idioma.</p>
                        <p>Nuestro programa se desarrollara en el siguiente horario:<br/> 
                        Lunes a Viernes de 9:00 a 18:00. Sábado de 10:00 a 13:00.
                        </p>
                        <p>
                            <a class="btn btn-info" data-toggle="collapse" data-target="#programa">
                            Ver Programa &raquo;</a>
                        </p>
                        <div id='programa' class='collapse on'>
                            <div class='well span6'>
                                <p>&raquo; Explicaciones del contenido de cada sesión.</p>
                                <p>&raquo; Distribución de grupos por edades en el campo de fútbol.</p>
                                <p>&raquo; Descanso y recuperación de fuerzas.</p>
                                <p>&raquo; Clases de Inglés en grupos reducidos.</p>
                                <p>&raquo; Profesionales del deporte daran charlas a los participantes,
                                enriqueciendo sus conocimientos, a continuación firmaran autografos
                                y podrán realizar fotografias.</p>
                                <p>&raquo; Visionado de videos de fútbol.</p>
                                <p>&raquo; Cada participante recibira un alumuerzo a media mañana,
                                comida al mediodía y merienda al finalizar las sesiones.</p>
                                <p><em>Todos los alimentos del campus reciben un exigente control
                                sanitario cumpliendo todas las normas de revisión de una empresa con
                                el certificado de calidad ISO 9001</em>
                            </div>
                            <div class='span5'>
                            	<img src='http://www.ensenalia.com/sites/default/files/userfiles/image/CAMPAMENTOS/IMG_1672.jpg' alt='Programa Diario' />
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class='span12'>
                    <header>
                        <h3>Actividades complementarias</h3>
                    </header>
                    <div>
                        <p>Nuestro programa se complenta con las siguientes actividades
                        complementarias</p>
                        <p>
                            <a class="btn btn-info" data-toggle="collapse" data-target="#complementarias">
                            Ver Actividades Complementarias &raquo;</a>
                        </p>
                        <div id='complementarias' class='collapse on'>
                          <div class="well span6">
                           <p>&raquo; Videos de fútbol</p>
                           <p>&raquo; Charlas de profesionales relacionadas con el deporte</p>
                           <p>&raquo; Visitas sorpresa</p>
                           <p>&raquo; Piscina y deportes alternativos</p>
                           <p>&raquo; Concursos y torneos</p>
                           <p>&raquo; Trabajo específico de porteros</p>
                           <p>&raquo; Fiesta final para los padres y alumnos del campus</p>
                      </div>
                      <div class='span5'>
                      	<img src='http://www.ensenalia.com/sites/default/files/userfiles/image/CAMPAMENTOS/IMG_2717.jpg' alt='Actividades Complementarias'/>
                      </div>
                    </div>
                    </div>
                </div>
                
                <div class='span12'>
                    <header>
                        <h3>Equipo Humano</h3>
                    </header>
                    <div>
                        <p>Nuestro equipo humano se compone de cualificados profesionales.</p>
                        <p>
                            <a class="btn btn-info" data-toggle="collapse" data-target="#equipo">
                            Ver Equipo Humano &raquo;</a>
                        </p>
                        <div id='equipo' class='collapse on'>
                          <div class="well span6">
                           <p>&raquo; Coordinadores de campo y entrenamientos.</p>
                           <p>&raquo; Entrenadores con titulación nacional.</p>
                           <p>&raquo; Monitores titulados.</p>
                           <p>&raquo; Monitoras de guardería tituladas.</p>
                           <p>&raquo; Profesores de inglés de Enseñalia.</p>
                           <p>&raquo; Médico de Medicina general.</p>
                           <p>&raquo; Socorristas</p>
                           <p>&raquo; Monitores y coordinadores de comedor.</p>
                           <p>&raquo; Nutricionista.</p>
                           <p>&raquo; Responsable de Material.</p>
                           <p>&raquo; Responsable de Administración.</p>
                           <p>&raquo; Encargado de Atención telefónica permanente.</p>
                           <p>&raquo; Coordinador de Prensa para anunciar el evento.</p>
                           <p>&raquo; Coordinador de eventos extras.</p>
                           <p>&raquo; Monitores de Autobús.</p>
                      	</div>
                      	<div class="span5">
                      		<img src='http://www.ensenalia.com/sites/default/files/userfiles/image/CAMPAMENTOS/IMG_1566.jpg' alt='Equipo Humano' />
                      	</div>
                      </div>
                    </div>
                </div>
                <div class='span12'>
                    <header>
                        <h3>Instalaciones</h3>
                    </header>
                    <div>
                        <p>
                          El <strong>Football &amp; English Camp 2012</strong> se realizara en Villanueva de Gallego
                        </p>
                        <p>
                            <a id='verInstalaciones' class="btn btn-info" data-toggle="collapse" data-target="#ubicacion">
                            Ver Instalaciones &raquo;</a>
                        </p>
                    </div>
                     <div id='ubicacion' class='collapse on'>
                     	<div class='well span6'>	
                     		<p>&raquo; Dos campos de fútbol de hierba artificial.</p>
                     		<p>&raquo; Piscina cubierta y al aire libre.</p>
                     		<p>&raquo; Pabellón cubierto.</p>
                     		<p>&raquo; Pistas de Pádel y Tenis.</p>
                     		<p>&raquo; Aulas para el aprendizaje de Inglés.</p>
                     		<p>&raquo; Amplios y completos vestuarios.</p>
                     		<p>&raquo; Salon comedor.</p>
                     		<p>&raquo; Pistas de fútbol sala y baloncesto.</p>
                     		<p>&raquo; Campo de fútbol playa.</p>
                     		<div id="map_canvas"></div>
                     	</div>
                     	<div class='span5'>
                     		<img src='http://www.ensenalia.com/sites/default/files/userfiles/image/CAMPAMENTOS/villanueva02.jpg' alt='Instalaciones' />
                     	</div>
                    </div>
                    
                </div>
                <div class='span12'>
                	<header>
                		<h3>Precio</h3>
                		</header>
                		<div class='well'>
                		<p>Para las 2 semanas del cursos el precio es de 369 €.</p>
						<p>Servicio de Guardería para los hermanos de 3 a 6 años: 120 € (incluye comidas).</p>
						<h4>El pago incluye:</h4>
						<p>&raquo;<em> Almuerzo, comida y merienda. Comida especial para celíacos.</em></p>
						<p>&raquo;<em> Equipación deportiva obligatoria.</em></p>
						<p>&raquo;<em> Desplazamiento en autobús hasta las instalaciones del campus y regreso.</em></p>
						<p>&raquo;<em> Clases de Ingles.</em></p>
						<p>&raquo;<em> Diplomas y regalos.</em></p>
						<p>&raquo;<em> Asistencia médica.</em></p>
						<p>&raquo;<em> Seguro para cada participante.</em></p>
                		</div>
                </div>
                <div class='span12'>
                	<div class='alert alert-info'>
                		<h2 class='alert-heading'>IMPORTANTE:</h2>
                		Teléfono permanente para comunicación de padres 
                		o familiares que se facilitará el primer día del campus. 
                		Los jugadores estarán bajo control de los técnicos del campus 
                		durante todo el día, incluyendo los desplazamientos en autobús. 
                		En la piscina estarán controlados por los técnicos y socorristas.
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
                <div class='span4'>
                    <header>
                        <h3>Ruta 1</h3>
                        <p><em>Avda Cataluña - Maria Zambrano - Avda Academia 
                        General Militar - Ciudad del Transporte - Zuera - 
                        Villanueva de Gallego
                        </em></p>
                        <p>
                        <a id='verRuta1' class="btn btn-info" data-toggle="collapse"
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
                <div class='span4'>
                    <header>
                        <h3>Ruta 2</h3>
                        <p><em>Cmo las Torres - Juan Pablo Bonet - Mariano Barbasán
                         - Tomas Bretón - Avda Navarra - Plz Europa</em>
                        <p>
                        <a id='verRuta2' class="btn btn-info" data-toggle="collapse"
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
                 <div class='span4'>
                    <header>
                        <h3>Ruta 3</h3>
                        <p><em>Pso Pamplona - Gomez Laguna - Tomas Anzano - 
                        Ronda Oliver - Torres de San Lamberto</em>
                        <p>
                        <a id='verRuta3' class="btn btn-info" data-toggle="collapse"
                        data-target="#ruta3">Ver Ruta 3 Detallada &raquo;</a>
                        </p>
                    </header>
                    <div id="ruta3" class='collapse on'>
                     <div class='well'>  
                     <table class='table table-striped table-condensed'>
                      <thead>
                       <tr>
                        <th>Parada</th>
                        <th>IDA</th>
                        <th>VUELTA</th>
                       </tr>
                      </thead>
                      <tbody id='detalleRuta3'>
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
                    <a href="http://www.youtube.com/watch?v=PSh534c9wwM" rel="prettyPhoto" title="Football & English 2012">
                    	<img src="http://img.youtube.com/vi/PSh534c9wwM/0.jpg" class="cloudcarousel" alt="" title="Football &amp; English Camp 2012"/>
                    </a>
                    <a href="http://www.youtube.com/watch?v=lWKFXPwm1SI" rel="prettyPhoto" title="">
                    	<img src="http://img.youtube.com/vi/lWKFXPwm1SI/0.jpg" class="cloudcarousel" alt="" title="Promocional Football &amp; English Camp"/>
                    </a>
                    <a href="http://www.youtube.com/watch?v=PhET-v1OqIY" rel="prettyPhoto" title="">
                    	<img src="http://img.youtube.com/vi/PhET-v1OqIY/0.jpg" class="cloudcarousel" alt="" title="Aragón en Abierto - Reportaje Football &amp; English Camp"/>
                    </a>
                    <a href="http://www.youtube.com/watch?v=ajl1TX9_zsw" rel="prettyPhoto" title="">
                    	<img src="http://img.youtube.com/vi/ajl1TX9_zsw/0.jpg" class="cloudcarousel" alt="" title="Football &amp; English Camp Saludable"/>
                    </a>
                    <a href="http://www.youtube.com/watch?v=3HrV_VMG6hc" rel="prettyPhoto" title="">
                    	<img src="http://img.youtube.com/vi/3HrV_VMG6hc/0.jpg" class="cloudcarousel" alt="" title="Visita de Ander Garitano - Footbal &amp; English Camp 2011"/>
                    </a>
                    <a href="http://www.youtube.com/watch?v=v6gLgeEYVwA" rel="prettyPhoto" title="">
                    	<img src="http://img.youtube.com/vi/v6gLgeEYVwA/0.jpg" class="cloudcarousel" alt="Emisión en Antena 3 Noticias el 12/07/10" title="A3N - Campus Fútbol Zaragoza - Mundial 2010"/>
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
<!--      <form id='formularioInscripcion' method='post' action='inscripcion.php' enctype="multipart/form-data"> -->
          <form id='formularioInscripcion' method='post' action='postTest.php' enctype="multipart/form-data">
     
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
                        <input type="date" id='fechaParticipante' name='fechaParticipante' class="span2 required" placeholder="dd/mm/aaaa">
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
                        <input type="text" name='colegioParticipante' class="span4 required" placeholder="Colegio del Participante"> 
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
                                <textarea class="input-xlarge" id="comentarios" name='comentariosParticipante' rows="5"></textarea>
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
                            <input type="text" name='emailPadre' class="span4" placeholder="Email">
         
                            <h4>Datos de la Madre / Tutora Legal</h4>
                            <label>Nombre:</label> 
                            <input type="text" name='nombreMadre' class="span4" placeholder="Nombre de la Madre/Tutora">
                            <label>Apellidos:</label> 
                            <input type="text" name='apellidoMadre' class="span4" placeholder="Apellidos de la Madre/Tutora"> 
                            <label>Móvil:</label>
                            <input type="text" name='movilMadre' class="span4" placeholder="Numero Movíl"> 
                            <label>Correo Electronico:</label> 
                            <input type="text" name='emailMadre' class="span4" placeholder="Email">
                        </div>
                </div>
                
                
                    <div class='span12'>
                    <header>
                        <h3>Opciones Football &amp; English Camp 2012</h3>
                        <p>
                            <em>*Señale las opciones que se desea contratar</em>
                        </p>
                    </header>
                    </div>
                    <div class='span6'>
                        <div class='alert alert-info'>
                            <h4>Football &amp; English Camp 2012 - Del 2 al 13 De Julio</h4>
                            <label class="checkbox"> 
                                <input type="checkbox" id="1semana" name="semana1Campus" value="Si" checked>
                                Marcar inscribirse en el Campus
                            </label>
                        </div>
                    </div>
                    <div class='span6'>      
                        <div class="alert alert-info">
                            <h4>Servicio de Guarderia para hermanos de 3 a 6 años</h4>
                            <label class="checkbox"> 
                                <input type="checkbox" id="guarderia" name="guarderia" value="Si">
                                Marcar para solicitar en el servicio de guarderia
                            </label>
                        </div>
                    </div>
                    <!-- Muestra la seccion del codigo promocional -->
                    <div class='span12'>
                    	<div class='alert alert-info'>
                    		<h4>Codigo Promocional</h4>
                    		<p><em>*Si dispone de codigo promocional escribalo aqui</em></p>
                    		<input type='text' name='codigoDescuento' placeholder='Codigo Promocional' />
                    		<input type='button' class='btn btn-success' id='aplicarDescuento' value='Aplicar Descuento' />
                    	</div>
                    </div>
                    <!-- Muestra el total de la inscripción segun lo que se ha contratado -->
                    <div class='span12'>
                    	<div class='alert alert-success'>
                    		<p><span class='totalInscripcion'>Total Inscripción:</span><span id='totalInscripcion'>369€</span></p>
                    	</div>
                    </div>
                    <!-- Seccion de la seleccion de talla de la equipacion -->
                    <div class='span12'>
                    	<header>
                    	<h3>Equipación</h3>
                    	<p>
                    		<em>*Seleccione la talla de la equipación del participante</em>
                    	</p>
                    	</header>
                    </div>
                    <div class='span12'>
                    	<div class='alert alert-info'>		
                    		<select id='talla' name='talla'>
                    			<option value='0'>-- Seleccione la Talla --</option>
                    			<optgroup label="Tallas">
                    			<option value='4'>4</option>
                    			<option value='6'>6</option>
                    			<option value='8'>8</option>
                    			<option value='10'>10</option>
                    			<option value='XXS'>XXS</option>
                    			<option value='XS'>XS</option>
                    			<option value='S'>S</option>
                    			<option value='M'>M</option>
                    			<option value='L'>L</option>
                    			<option value='XL'>XL</option>
                    			<option value='XXL'>XXL</option>
                    			<option value='3XL'>3XL</option>
                    			</optgroup>
                    		</select>
                    		<input id='tallas' type='button' class='btn btn-info' value='Ver guia de Tallas'>
                    	</div>
                    </div>
                    <!-- Seccion de la seleccion de rutas de autobus -->
                    <div class='span12'>
                        <header>
                        <h3>Servicio De Autobus</h3>
                        <p>
                        <em>Debe especificar la ruta de ida
                            y la ruta de vuelta asi como la parada tanto de ida como de vuelta</em>
                        </p>
                        </header>
                    </div>
                    <div class='span6 rutas'>
                        <div class="control-group alert alert-info">
                        <header>
                            <h5>Ruta Ida:</h5>
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
                            <label class="checkbox inline"> 
                                <input type="radio"  name="rutaIda" id='ruta3Ida' value="Ruta3">
                                Ruta 3
                            </label>
                        </div>
                        <label>Parada:</label> 
                        <select id='nombreParadaIda' name='paradaIda' class='span5'></select>
                        </div>
                    </div>
                    <div class='span6 rutas'>
                        <div class="control-group alert alert-info">
                        <header>
                            <h5>Ruta Vuelta:</h5>
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
                            <label class="checkbox inline"> 
                                <input type="radio"  name="rutaVuelta" id='ruta3Vuelta' value="Ruta3">
                                Ruta 3
                            </label>
                        </div>
                        <label>Parada:</label>
                        <select id='nombreParadaVuelta' name='paradaVuelta' class='span5'></select>
                        </div>
                    </div>
                <div class='span12'>
                	<header>
                		<h3>Invita a tus amigos y conseguid un 10% de descuento</h3>
                		<p><em>
                			* Si 5 o mas de tus amigos se inscriben en el campus conseguireis un 10% de descuento cada uno
                		</em></p>
                		<p><em>
                			* Los descuentos no son acumulables
                		</em></p>
                	</header>
                	<div id='emailsAmigos' class='well'>
                		<input type='hidden' id='totalEmails' value='0' />
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
                        <h3>Condiciones Generales del Football &amp; English Camp 2012</h3>
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
                            las condiciones del Football &amp; English Camp 2012</strong>
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
$(window).load(function() {
	$("#myCarousel").CloudCarousel({			
				reflHeight: 46,
				reflGap:2,
				titleBox: $("#title-text"),
				altBox: $("#alt-text"),
				buttonLeft: $("#left-but"),
				buttonRight: $("#right-but"),
				yRadius:80,
				xRadius:350,
				xPos: 480,
				yPos: 40,
				speed:0.15,
				minScale:0.25
	});
    $("a[rel^='prettyPhoto']").prettyPhoto();
});

$('document').ready(
	function() {
		// Activamos los tooltips
	   	$('.mensaje').tooltip();
		// Ocultamos el boton aceptar - Modificar para el back
	   	$('#botonAceptar').hide();
		// Configuramos el datepicker de la fecha de nacimiento
	   	$('#fechaParticipante').datepicker({
			firstDay: 1,
			dateFormat: 'dd/mm/yy',
			dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],		    
			monthNamesShort:['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
			yearRange: '-17:+0',
			changeMonth: true,
			changeYear: true 
			});
	   	// Inicializamos los mensajes del validador
	   	jQuery.validator.messages.required = "";
	   	// Validador de campos
		$("#formularioInscripcion").validate({		   
			invalidHandler: function(e, validator) {
				var errors = validator.numberOfInvalids();
				if (errors) {
					var message = errors == 1
			    		? 'Falta por rellenar 1 campo obligatorio. Por favor, revise los campos marcados con *'
			    		: 'Faltan por rellenar ' + errors + ' campos obligatorios. Por favor, revise los campos marcados con *';
			    	$("div.error span").html(message);
			    	$("div.error").show();
				} else {
					$("div.error").hide();
				}
			},
			onkeyup: false,       
			messages: {           
				email: {
			    	required: " ",
			        email: "Por favor introduce una direccion de correo valida, ejemplo: you@yourdomain.com",
			        condiciones: "Debe aceptar las condiciones del English Camp para poder Inscribirse"
			    }
			},
		});
			  
		// Inicializamos el mapa		  
		
		// Lanzamos la funcion
		
	});
// Fin del ready
function initialize() {
	var latlng = new google.maps.LatLng(41.758420, -0.833491);
	var myOptions = {
						zoom : 14,
						center : latlng,
						mapTypeId : google.maps.MapTypeId.ROADMAP
					};
	var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
	map.setCenter(latlng);
	var marker = new google.maps.Marker({
									map : map,
									position : latlng,
									title : 'Campus Football and English 2012 - Enseñalia'
									});
	var infoWindow = new google.maps.InfoWindow;
	google.maps.event.addListener(marker,'click',function() {
									latlng = marker.getPosition();
									infoWindow
										.setContent('<h5>Campus Football and English 2012 </h5>'
															+ 'Calle de Rigoberta Menchú - 50830 - Villanueva de Gállego')
										.setOptions({ 'maxWidth' : 100 })
										.open(map, marker);
									});
	google.maps.event.addListener(map, 'click',function() { infoWindow.close(); });
}

$('#verInstalaciones').click(function(){
	initialize();
});
 // Muestra el boton de aceptar si se marcan las condiciones
 $('#condiciones').click(function(){
	 if($("#condiciones").is(':checked')) {  
         $('#botonAceptar').show('blind'); 
     } else {  
         $('#botonAceptar').hide('blind');  
     }  
 });		
// Carga el listado de ruta de ida segun la seleccion
 $("input[name=rutaIda]").click(function(){
	 $.post('inc/handler.php',{rutaIda:this.value},function(data){
		if( data ) {
		  	$("#nombreParadaIda").html(data);
		}
	 }).ajaxStart(function(){ $('#nombreParadaIda').html('Cargando Datos Ruta');});
	 
 });
 // Carga el listado de ruta de vuelta segun la seleccion
 $("input[name=rutaVuelta]").click(function(){
	 $.post('inc/handler.php',{rutaVuelta:this.value},function(data){
		if ( data ) {
		 	$("#nombreParadaVuelta").html(data);
		}
	 });
 });
 //Muestra la Ruta 1 al hacer clic en mostrar
 $("#verRuta1").click(function(){
	$.post('inc/handler.php',{ruta:1},function(data){
		$('#detalleRuta1').html(data);
	});
 });
 // Muestra la Ruta 2 al hacer clic en mostar
 $("#verRuta2").click(function(){
	$.post('inc/handler.php',{ruta:2},function(data){
		$('#detalleRuta2').html(data);
	});
 });
//Muestra la Ruta 3 al hacer clic en mostar
 $("#verRuta3").click(function(){
	$.post('inc/handler.php',{ruta:3},function(data){
		$('#detalleRuta3').html(data);
	});
 });
 // Ventana de tallas
 $('#tallas').click(function(){
		$('#dialog').html('<img src="img/tallas.png" alt="tallas" width="640px"/>');
		$('#dialog').dialog({
			title: 'Guia de Tallas',
			minWidth: 640
		});
	});
 // Cuadro de dialogo para la seleccion y edicion de la fotografia
 $('#upload').click(function(){
		$.get('uploader.php',function(data){
			$('#dialog').html( data );
		});
		$('#dialog').dialog({
			title: 'Seleccion y Edici&oacute;n de Fotografia',
			minWidth: 800,
			minHeight: 600
		});
 });
// Emails amigos
 $('.masAmigos').click(function(){
	console.log('Mas amigos');
		var numero = parseInt($('#totalEmails').val()) + 1;
	$('#totalEmails').val( numero );
	var data = "<p><label class='inline'>Introduce Email:</label><input class='control-label' type='text' name='amigos["+numero+"]' /></p>";
	$('#emailsAmigos').append(data);
 });
 
		// 	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		// 	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		// 	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		// 	s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
</body>
</html>