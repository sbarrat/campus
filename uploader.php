<div id='result'></div>
<div id='frmUploader'>
	<input class='input-file inline' id="fileupload" type="file" name="files[]">
	<div id='imageTools'>
		<input type="button" class="btn btn-success btn-large" id="recortar" value="Recortar"/>	
	</div>
	<div class='alert alert-info'>
		<p><em>*Tamaño maximo 2MB, Dimensiones maximas de la seleccion 150x150</em></p>
		<p><em>Una vez seleccionada y subida la imagen seleccione el area que quiera usar</em></p>
	</div>
	
	<div class="span5">
                <!-- The global progress bar -->
                
    </div>
   <div id='fileupload-progress'>
    	<div class="progress progress-success progress-striped active">
             <div class="bar"></div>
        </div>
   </div>
   
	<form id='fileParams' name='fileParams' action="" method="post" >
		<input type='hidden' id='filename' name='filename'/>
		<input type='hidden' id='newFilename'/>
		<input type='hidden' id='x' name='x' />
		<input type='hidden' id='y' name='y' />
		<input type='hidden' id='w' name='w' />
		<input type='hidden' id='h' name='h' />
	</form>
	
</div>
<div id='image' class="jcrop"></div>
	


<!-- <script src='js/libs/jquery-1.7.1.min.js'></script> -->
<!-- <script src='js/libs/jquery-ui-1.8.18.custom.min.js'></script> -->
<script src="js/libs/vendor/jquery.ui.widget.js"></script>
<script src="js/libs/jquery.iframe-transport.js"></script>
<script src="js/libs/jquery.fileupload.js"></script>
<!-- <script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script> -->
<!-- <script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script> -->
<!-- <script src="js/libs/jquery.fileupload-ip.js"></script> -->
<script src='js/libs/jquery.Jcrop.min.js'></script>
<script src='js/libs/jquery.color.js'></script>
<script>
$(function () {
	$("#recortar").hide();
	$('#fileupload').fileupload({
        dataType: 'json',
        url: 'server/php/index.php',
        done: function (e, data) {
            $.each(data.result, function ( index, file ) {
                $('#filename').val(file.name);
            	$('#image').html('<img id="preview" src="server/php/files/'+file.name+'">');
                $('#image').css({'width':'640px','height':'480px','overflow':'auto'});
                $('#preview').Jcrop({
            		aspectRatio: 1,
            		onSelect: updateCoords
            	});
            });
            $('#recortar').show();
        }
    }).bind('fileuploadstart', function () {
    	var widget = $(this),
        	progressElement = $('.progress').fadeIn(),
        	interval = 500,
        	total = 0,
        	loaded = 0,
        	loadedBefore = 0,
        	progressTimer,
        	progressHandler = function (e, data) {
            	loaded = data.loaded;
            	total = data.total;
        	},
        	stopHandler = function () {
            	widget
                	.unbind('fileuploadprogressall', progressHandler)
                	.unbind('fileuploadstop', stopHandler);
            	window.clearInterval( progressTimer );
            	progressElement.fadeOut(function () {
                	progressElement.html('');
            	});
        },
        formatPercentage = function (floatValue) {
            return (floatValue * 100).toFixed(0) + '%';
        },
        updateProgressElement = function (loaded, total, bps) {
            console.log( formatPercentage(loaded / total) );
        	$('.bar').css('width',formatPercentage(loaded / total) );
        },
        intervalHandler = function () {
            var diff = loaded - loadedBefore;
            if (!diff) {
                return;
            }
            loadedBefore = loaded;
            updateProgressElement(
                loaded,
                total,
                diff * (1000 / interval)
            );
        };
    widget
        .bind('fileuploadprogressall', progressHandler)
        .bind('fileuploadstop', stopHandler);
    progressTimer = window.setInterval(intervalHandler, interval);
});
});
$('#recortar').click(function(){
	$.post('recorta.php',$('#fileParams').serialize(),function(data){
		$('#foto').html('<img src="server/php/files/'+ data +'">');
		$('#imgOri').val($('#filename').val());
		$('#imgNew').val(data);
		$('#frmUploader').html('');
		$('#image').html('');
		$('#result').html('<div class="alert alert-success">La imagen ha sido recortada, cierre el cuadro de dialogo desde la X</div>');
		$('#recortar').hide();	
	});
	
});
function updateCoords(c)
{
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
};

function checkCoords()
{
	if (parseInt($('#w').val())) return true;
	alert('Por favor seleccione un area para recortar.');
	return false;
};

</script>
