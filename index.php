<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic Ajax and PHP tutorial</title>

<script type="text/javascript" src="Ajaxfileupload-jquery-1.3.2.js" ></script>
<script type="text/javascript" src="ajaxupload.3.5.js" ></script>
<link rel="stylesheet" type="text/css" href="Ajaxfile-upload.css" />

<script type="text/javascript" >
	$(function(){
		var btnUpload=$('#me');
		var mestatus=$('#mestatus');
		var files=$('#files');
		
		new AjaxUpload(btnUpload, {
			action: 'uploadPhoto.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg)$/.test(ext))){ 
                    // extension is not allowed 
					mestatus.text('Por favor, suba archivos con extensión JPG');
					return false;
				}
				mestatus.html('<img src="img/ajax-loader.gif" height="16" width="16">');
			},
			onComplete: function(file, response){
				//On completion clear the status
				mestatus.text('Carga completa');
				//On completion clear the status
				files.html('');
				//Add uploaded file to list
				if(response==="success"){
					$("#file_pc").attr("src","images_pc/webinfopedia_"+file);
				} else{
				}
			}
		});
		
	});
</script>

</head>

<body>

<div id="me" class="styleall" style=" cursor:pointer;">Upload</div>
<span id="mestatus"></span>
<img id="file_pc" src="" />
      
</body>
</html>
