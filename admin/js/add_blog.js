
function _(el){
	return document.getElementById(el);
}



function upload(){
	

	var file = _("image").files[0];
	var filename = _("image").files[0].name;
	var cat =  _("categoryCat").value;
	var sub =  _("categorySub").value;

	var author =  _("Author").value;
	var heading =  _("heading").value;

var paragraph = CKEDITOR.instances.paragraph.getData();
var url =  _("blogUrl").value;
	var date =  _("date").value;
	url = url.toLowerCase();
	
	var tag =  _("adinput").value;
	
	var descrpt =  _("description").value;

if (cat == "Select" )
	
	{
		alert('Plzx Select Categories and Author....!!!');
	}

else if (author == "Select" )
	
	{
		alert('Plzx Select Categories and Author....!!!');
	}
	else if (url == "" )
	
	{
		alert('Plzx Enter Custom URL....!!!');
	}
else {
	

	var formdata = new FormData();
	formdata.append("file", file);
	formdata.append("cat", cat);
	formdata.append("sub", sub);
		formdata.append("author", author);
		formdata.append("heading", heading);
		formdata.append("date", date);
		formdata.append("paragraph", paragraph);
		formdata.append("url", url);
		formdata.append("descrpt", descrpt);
		formdata.append("tag", tag);


	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "js/addblog.php");
	ajax.send(formdata);


}
}
function progressHandler(event){
	var percent = (event.loaded / event.total) * 100;
	_('login-alert').classList.remove('hidden');
	_('login-alert').classList.add('alert-warning');
	_("login-alert").innerHTML = " "+ Math.round(percent)+"% uploading...";
}
function completeHandler(event){
	_("login-alert").innerHTML = event.target.responseText;
_('login-alert').classList.remove('alert-warning');
_('login-alert').classList.add('alert-success');
_('login-alert').classList.remove('hidden');
	
setTimeout(function(){
    location = ''
  },1000)
	
	
}
function errorHandler(event){
	_("login-alert").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("login-alert").innerHTML = "Upload Aborted";
}

