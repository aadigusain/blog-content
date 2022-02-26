
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	
	

	
	var file = _("image").value;
	var name =  _("AuthorName").value;

	var about =  _("AuthorAbout").value;
	var id =  _("AuthorId").value;

if(file == "")
{
	filev = "";
	file = "";
}

else {
	var filev = "aadi";
	var file = _("image").files[0];
	var filename = _("image").files[0].name;
}

	var formdata = new FormData();
	formdata.append("file", file);
	formdata.append("filev", filev);
	formdata.append("id", id);

	formdata.append("name", name);
	formdata.append("about", about);


	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "js/editauthor.php");
	ajax.send(formdata);


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
	

	
	
}
function errorHandler(event){
	_("login-alert").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("login-alert").innerHTML = "Upload Aborted";
}
