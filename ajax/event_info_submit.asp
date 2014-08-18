<!--#include file="../includes/databaseFunctions.asp"-->
<!--#include file="../../../../includes/settings_wwjc.asp"-->
<!--#include file="JSON_2.0.4.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->

<%
dim eventName, eventDay, eventDate, eventLoc, eventDesc, active, pkid, eventPrice, eventTime, eventType, insert, update, msg
eventName = scrubForDB("eventName")
eventDay = scrubForDB("eventDay")
eventDate =  scrubForDB("eventDate")
eventDate = FormatDateTime(eventDate,0) 
eventLoc =  scrubForDB("eventLoc")
eventDesc =  scrubForDB("eventDesc")
active =  1
pkid = request.Querystring("pkid")
eventPrice =  scrubForDB("eventPrice")
eventTime =  scrubForDB("eventTime")
eventType =  scrubForDB("eventType")
insert = "INSERT into event (eventName, eventDay, eventDate, eventLoc, eventDesc, active, eventPrice, eventTime, eventType) VALUES ('"&eventName&"','"&eventDay&"','"&eventDate&"','"&eventLoc&"','"&eventDesc&"','"&active&"','"&eventPrice&"','"&eventTime&"','"&eventType&"')"
update = "UPDATE event SET eventDay = '"&eventDay&"', eventName = '"&eventName&"', eventDate = '"&eventDate&"', eventLoc = '"&eventLoc&"', eventDesc = '"&eventDesc&"', active = '"&active&"', eventPrice = '"&eventPrice&"', eventTime = '"&eventTime&"',eventType = '"&eventType&"' WHERE pkid = "&pkid
If pkid>1 Then 
	mySQL = update
	msg = eventName & " has been updated"
Else 
	mySQL = insert
	msg = eventName & " has been added"
End if
response.write msg
call updateDatabase(mySQL, rsTemp, "member action")
function scrubForDB(val)
scrubForDB = replace(Trim(request.form(val)), "'", "''")
end function
%>