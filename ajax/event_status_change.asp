<!--#include file="../includes/databaseFunctions.asp"-->
<!--#include file = "../../../includes/settings_wwjc.asp"-->
<!--#include file="JSON_2.0.4.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->

<%
dim query, dbc, eventid, task,isActive
eventid = request.form("eventid")
task = request.form("task")
'default action is to delete event
isActive = 0 


if task = "unDeleteEvent" then 
	isActive = 1 
end if
query = "UPDATE event SET active = "&isActive&" WHERE pkid = " + eventid
response.write(query)
call updateDatabase(query, rsTemp, "") 
%>