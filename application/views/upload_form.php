<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error; ?>

<?php echo form_open_multipart('front/form/do_upload'); ?>

<input name="userfile" type="file" />
<br>
<input name="userfile2" type="file" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>