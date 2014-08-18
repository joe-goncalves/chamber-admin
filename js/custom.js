$(document).ready(function(){
	drawMemberList("pending-member-list",1, "No Pending Members");
	drawMemberList("current-members-list",2, "No Current Members");
	drawMemberList("suspended-member-list",3, "No Suspended Members");
	drawEventList("upcoming-event-list",1, "No Upcoming Event");
	drawEventList("deleted-event-list",2, "No Upcoming Deleted Event");
	drawRadioButtonGroupFromJSON("mbr-lvl-radio-box", "ajax/member_levels.asp", "memberLevel");
	drawSelectorFromJSON("BusinessType", "ajax/business_cat.asp");
	drawSelectorFromJSON("eventType", "ajax/get_event_type.asp");
	
	//drawEventList("deleted-event-list",3, "No Deleted Events");
	$(".panel-heading").click(function(){
		$arrow = $(this).children("span");
		$content = $(this).siblings(".panel-body");
		$arrow.toggleClass("glyphicon-circle-arrow-down").toggleClass("glyphicon-circle-arrow-up");
		$content.toggleClass('hidden');
	});
	$("#add_new").click(function(){
		$("#new_member_frm input[type='text']").val("");
		$('#new_member_form').modal();
	});
	$("#add_new_event").click(function(){
		$("#event_frm input[type='text']").val("");
		$("#event_frm_hldr").modal();
	});
	$("#new_member_submit").click(function(e){
		e.preventDefault();
		var pkid = $("#pkid").val();
		if (!pkid){
			pkid = 0;
		}
		console.log(pkid);
		memberFormValid(pkid);
	});	
	$("#event_frm_submit").click(function(e){
		e.preventDefault();
		var pkid = $("#pkid").val();
		if (!pkid){
			pkid = 0;
		}
		eventFormValidate(pkid);
	})
	$("#login").click(function(e){
		e.preventDefault();
		data = $("#login_form").serialize();
		$.post("ajax/check_login.php", data,  function(data){
			data_obj = $.parseJSON(data);
			if (data_obj.username_valid == false){
				var msg = "Your Username or Password are incorrect";
			}else if(data_obj.password_valid == false){
				var msg = "Your Password does not match your Username";
			}
			if (msg){
				$("#login_error").html(msg).removeClass('hidden');
			}else{
				$("#login_error").addClass('hidden');
				document.cookie="ronkChamberAdmin=" + $("[name ='user_name']").val();
				window.location.replace("members.php");
			}
		});
	});
});

/* ...........................FUNCTION LIBRARY | Members Page.........................*/

function drawMemberList(container_id, task, emptymsg){
	$.get( "ajax/request_member_list.asp?task="+task, function( data ) {
		var listHTML = "";
		var list = $.parseJSON(data);
		var addToTable = [];   
		for(var member in list) { 
    		memberobj = list[member];
			var memberName = memberobj["memberName"]; 
			var memberID = memberobj["pkid"]; 	
  			addToTable.push(createMemberLine(memberName, memberID, task));
		}
		var addToTableStr = addToTable.join('');
		if ($.trim(addToTableStr) == ""){
			$( "#"+container_id ).html(emptymsg);
		}
		$( "#"+container_id ).append(addToTableStr);
		$('[data-task]').on("click", function(e){
			var task = $(this).attr('data-task');
			var mbrID = $(this).attr('data-mbrID');
			if (task == "edit"){
				$.get("ajax/request_member_info.asp?memberid="+mbrID, function(data){
					var member_info_obj = $.parseJSON(data);
					for (var field in member_info_obj[0]){
						$("[name='"+field+"']").val(member_info_obj[0][field]);
					}	
					$('#new_member_form').modal();
					$('#new_member_form').on('shown.bs.modal', function () {
						$("#BusinessType").val(member_info_obj[0]["memberCatID"]);
						var level = member_info_obj[0]["memberLevel"];
						$("[name = 'memberLevel']").each(function(){
							if ($(this).val()==level){
								$(this).attr("checked","checked"); 
							}
						});
  					});
				})
			}else if (task == "delete"){
				$("#confirm_member_delete_modal").modal();
				$("#mbr_delete_yes").on("click", function(){
					$.post("ajax/member_status_change.asp", {task: task, mbrID: mbrID}, function(data){
						location.reload(true);
					});
				});
				$("#mbr_delete_no").on("click", function(){
					$('#confirm_member_delete_modal').modal('hide');
				});
			}else{
				$.post("ajax/member_status_change.asp", {task: task, mbrID: mbrID}, function(data){
					location.reload(true);
				});
			}
		});
	});
}

function createMemberLine(memberName, memberID, task){
	var memberLine = "";
	if (task == 1){ /*pending*/
		memberLine = "<tr><td>"+memberName+"</td><td><div class = 'btn-toolbar' role = 'toolbar'><div class = 'btn-group pull-right'></span></button><button class='btn btn-default btn-sm' data-task = 'unsuspend' data-mbrID = "+memberID+" type='button'><span class='glyphicon glyphicon-play'></span></button><button class='btn btn-default btn-sm' data-task = 'delete' data-mbrID = "+memberID+" type='button'><span class='glyphicon glyphicon-trash'></span></button></div></div></td></tr>";
	}else if (task >= 2){ /*current*/
		memberLine = "<tr><td>"+memberName+"</td><td><div class = 'btn-toolbar' role = 'toolbar'><div class = 'btn-group pull-right'><button class='btn btn-default btn-sm' data-task = 'edit' data-mbrID = "+memberID+" type='button'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-default btn-sm' data-task = 'suspend' data-mbrID = "+memberID+" type='button'><span class='glyphicon glyphicon-pause'></span></button><button class='btn btn-default btn-sm' data-task = 'delete' data-mbrID = "+memberID+" type='button'><span class='glyphicon glyphicon-trash'></span></button></div></div></td></tr>"; 
	}
	return memberLine;
}

function getMemberInfo(field, value){
	var memberInfo ="";
	if (!value) {
		value = "";
	}
	var display_nm_obj = {
	    memberName : "Company Name", 
	    memberDesc : "Description", 
	    memberStreetAddress : 'Address | Street', 
	    memberTown : 'Address | Town', 
	    memberState : 'State', 
	    memberZip : 'Zip', 
	    memberContactName : 'Contact Name', 
	    memberContactNum : 'Contact Number', 
	    memberContactEmail : 'Contact Email', 
	    memberCatID : 'Business Type', 
	    memberLevel : 'Membership', 
	    memberWebsite : 'Website', 
	    memberYrsInArea: 'Years In Area',
	    memberNoEmp: 'No. Employees', 
	};
	for (var prop in display_nm_obj){
		if (field == prop){
			var disp_field = display_nm_obj[prop];
		}
	}
	if (disp_field == "Business Type"){
		memberInfo = "<div class='form-group'><label for = 'exstngBusinessType'>Business Type</label><select id = 'exstngBusinessType' Name = 'exstngBusinessType' class='form-control input-sm'></select></div>";
	}else if (disp_field == "Membership"){
		memberInfo = "<div class='form-group'><label for = 'exstng-mbr-lvl-radio-box'>Membership</label><div id = 'exstng-mbr-lvl-radio-box'></div></div>";
	}else{
		memberInfo = "<div class='form-group'><label for = '"+field+"_existing'>"+disp_field+"</label><input class= 'form-control' id = '"+field+"_existing' name  = '"+field+"_existing' type = 'text' value = '"+value+"'/></div>";
	}	
	return memberInfo;
}




function memberFormValid (memberID){
	$(".has-error").removeClass("has-error");
	var hasError = false;
	if (isBlank("memberName"))hasError = true;
	if (isBlank("memberContactName"))hasError = true;
	if (isBlank("memberStreetAddress"))hasError = true;
	if (isBlank("memberTown"))hasError = true;
	if ($("input[name = 'memberLevel']:checked").size()<1) {
		$("#mbr-lvl-radio-box").addClass("has-error");
		$("#mbr-lvl-radio-box").parent().addClass("has-error");
		hasError = true;
	}
	if(!validateZip($('#Zip').val())){
		$('#Zip').parent().addClass("has-error");
		hasError=true;		
	}

	if(hasError){
	/*scroll to the top of the modal*/
	}else {
		$.post("ajax/member_join_form_submit.asp?pkid="+memberID, $("#new_member_frm").serialize())	
			.fail(function(data){
				console.log(data);
			})
			.success(function (data){
				$("#new_member_frm_title").html("Success");
				$("#new_member_frm_body").html(data);
				$("#new_member_frm_body").parent().append('<div class="modal-footer"><button id = "member_action_done" type = "button" class = "btn btn-success btn-block">OK</button></div>');
				$("#member_action_done").bind("click", function(){
					location.reload(true);
				});
			});
	}

	
}
function isBlank(name){
	var is_blank = false;
	var curval = $.trim(  $("[name = '"+name+"']").val()  );
	if (!curval || curval == ""){
		is_blank = true;
		$("[name = '"+name+"']").parent().addClass("has-error");
	}
	return is_blank;
}

function isValidEmailAddress(emailAddress) {
	var pattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
	return pattern.test(emailAddress);
};

function validatePhone(phoneNumber){
   var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;  
   return phoneNumberPattern.test(phoneNumber); 
}

function validateZip(zip){
    var zipRegex = /^\d{5}$/;
    return zipRegex.test(zip);
}


/* ...........................FUNCTION LIBRARY | Events Page.........................*/



function drawEventList(container_id, task, msg){
	$.get( "ajax/request_event_list.asp?task="+task, function( data ) {
		var listHTML = "";
		var list = $.parseJSON(data);
		var addToTable = [];   
		for(var node in list) { 
    		memberobj = list[node];
			var eventName = memberobj["eventName"]; 
			var eventDate = memberobj["eventDate"]; 
			var eventID = memberobj["pkid"]; 	
  			addToTable.push(createEventLine(eventName, eventID, eventDate, task));
		}
		var addToTableStr = addToTable.join('');
		if (addToTableStr.length<1){
			$( "#"+container_id).html(msg);
		}
		$( "#"+container_id ).append(addToTableStr);
		$('[data-event-task]').on("click", function(e){
			var task = $(this).attr('data-event-task');
			var eventID = $(this).attr('data-eventID');
			console.log (task, eventID);
			if (task == "editEvent"){
				$.get("ajax/request_event_info.asp?eventid="+eventID, function(data){
					var event_info_obj = $.parseJSON(data);
					for (var field in event_info_obj[0]){
						$("[name='"+field+"']").val(event_info_obj[0][field]);
					}
					$('#event_frm_hldr').modal();
				});
			}else if (task == "deleteEvent"){
				$("#confirm_event_delete_modal").modal();
				$("#event_delete_yes").on("click", function(){
					$.post("ajax/event_status_change.asp", {task: task, eventID: eventID}, function(data){
						location.reload(true);
					});
				});
				$("#event_delete_no").on("click", function(){
					$('#confirm_event_delete_modal').modal('hide');
				});
			}else {
				$.post("ajax/event_status_change.asp", {task: task, eventID: eventID}, function(data){
					location.reload(true);
				});
			}
		});
	});
}

function createEventLine(eventName, eventID, eventDate, task){
	var EventLine = "";	
	if (task == 1){ /*upcoming*/
		EventLine ="<tr><td>"+eventName+"</td><td>"+eventDate+"</td><td><div class = 'btn-toolbar pull-right' role = 'toolbar'><div class = 'btn-group'><button class='btn btn-default btn-sm' data-event-task = 'editEvent' data-eventID = '"+eventID+"' type='button'><span class='glyphicon glyphicon-pencil'></span></button></button><button class='btn btn-default btn-sm' data-event-task = 'deleteEvent' data-eventID = '"+eventID+"' type='button'><span class=' glyphicon glyphicon-trash'></span></button></div></div></td></tr>";
	}else if (task == 2){ /*past*/
		EventLine = "<tr><td>"+eventName+"</td><td>"+eventDate+"</td><td><div class = 'btn-toolbar pull-right' role = 'toolbar'><div class = 'btn-group'><button class='btn btn-default btn-sm' data-event-task = 'unDeleteEvent' data-eventID = '"+eventID+"' type='button'><span class='glyphicon glyphicon-play'></span></button></div></div></td></tr>";
	}
	return EventLine;
}

function getEventInfo(field, value){
	var info ="";
	if (!value) {
		value = "";
	}
	  info = "<div class='form-group'><label for = '"+field+"'>"+field+"</label><input class= 'form-control' id = '"+field+"' type = 'text' value = '"+value+"'/></div>";
	return info;
}


/* ..................GENERIC FUNCTIONS..........................*/

function drawSelectorFromJSON(containerid, url){
	$.get(url, function(data){
		var data_array = [];
		var list = $.parseJSON(data);
		for (var cat in list){ 
			catobj = list[cat];
			var name = catobj["name"];
			var id = catobj["id"];
			data_array.push("<option value='"+id+"'>"+name+"</option>");
		}	
		var data_array_html = data_array.join('');
		$("#"+containerid).html(data_array_html);
	});
}

function drawRadioButtonGroupFromJSON(containerid, url, input_name){
	$.get(url, function(data){
		var data_array = [];
		var list = $.parseJSON(data);
		for (var level in list){ 
			levelobj = list[level];
			var name = levelobj["name"];
			var id = levelobj["id"];
			var price = levelobj["price"];
			var label = name  + "[$"+price+"]";
			data_array.push("<div class='radio'><label><input type='radio' name='"+input_name+"' value='"+id+"' >"+label+"</label></div>");
		}	
		var data_html = data_array.join('');
		$("#"+containerid).html(data_html);
	});
}

function eventFormValidate (pkid){
	$(".has-error").removeClass("has-error");
	var form_data = ($("#event_frm").serialize());
	var hasError = false
	$("#event_frm input.required").each(function(){
		if (isBlank($(this).attr("name"))){
			hasError=true;
		}
	});
	if(!isDate($("#eventDate").val())){
		hasError=true;
		$("#eventDate").parent().addClass("has-error");
	}

	if (!hasError){
		console.log(form_data);
		$.post("ajax/event_info_submit.asp?pkid="+pkid, form_data, function(data){
			$(".modal-header").html("Success");
			$(".modal-body").html(data);
			$(".modal-body").parent().append('<div class="modal-footer"><button id = "event_action_done" type = "button" class = "btn btn-success btn-block">OK</button></div>');
			$("#event_action_done").bind("click", function(){
				location.reload(true);
			})
		})
		.always(function(data){
			console.log(data);
		});
	}
}


function isDate(txtDate)
{
  var currVal = txtDate;
  if(currVal == '')
    return false;
  
  //Declare Regex  
  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; 
  var dtArray = currVal.match(rxDatePattern); // is format OK?

  if (dtArray == null)
     return false;
 
  //Checks for mm/dd/yyyy format.
  dtMonth = dtArray[1];
  dtDay= dtArray[3];
  dtYear = dtArray[5];

  if (dtMonth < 1 || dtMonth > 12)
      return false;
  else if (dtDay < 1 || dtDay> 31)
      return false;
  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
      return false;
  else if (dtMonth == 2)
  {
     var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
     if (dtDay> 29 || (dtDay ==29 && !isleap))
          return false;
  }
  return true;
}



