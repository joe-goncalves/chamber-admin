$(document).ready(function(){
	var admin = getCookie("ronkChamberAdmin");
	if (admin != ""){
		$("#logged_in_user").html("Admin User:&nbsp;&nbsp;" + admin);
		$("#admin_log_out").removeClass('hidden');
	}else {
		window.location.replace("login.php");	
	}

	$("#admin_log_out").click(function(e){
		e.preventDefault();
		del_cookie("ronkChamberAdmin");		
		window.location.replace("login.php");
	});
});
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
} 
function del_cookie(name) {
	document.cookie = name +
	'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
} 
	