<!DOCTYPE html>
<html>
<head>
	<title>Custom file</title>

	<script src="ckeditor/ckeditor.js" type="text/javascript" ></script>
</head>
<body>

	<!-- Editor -->
	<textarea id=''></textarea>

	<!-- Script -->
	<script type="text/javascript">
		CKEDITOR.replace( 'editor', {
            height: 300,
            filebrowserUploadUrl: "ajaxfile.php?type=file",
            filebrowserImageUploadUrl: "ajaxfile.php?type=image"
        } );
	</script>
</body>
</html>