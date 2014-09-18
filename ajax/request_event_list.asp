<!--#include file="../../includes/databaseFunctions.asp"-->
<!--#include file = "../../../../includes/settings_wwjc.asp"-->
<!--#include file="JSON_2.0.4.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->
<%
dim query, dbc, task
task = request.querystring("task")
'active upcoming events 
if task = 1 then
	query = "SELECT eventName, pkid, CONVERT(VARCHAR(10), eventDate, 110) AS eventDate FROM event WHERE eventDate >= GETDATE() AND active = 1 ORDER BY eventDate"
'past active events -curently disabled on the front end
elseif task = 3 then
	query = "SELECT eventName, pkid, CONVERT(VARCHAR(10), eventDate, 110) AS eventDate FROM event WHERE eventDate < GETDATE() AND active = 1 ORDER BY eventDate"
'upcoming deleted events
elseif task = 2 then
	query = "SELECT eventName, pkid, CONVERT(VARCHAR(10), eventDate, 110) AS eventDate FROM event WHERE eventDate >= GETDATE() AND active = 0 ORDER BY eventDate"
end if
set dbc = server.createObject("adodb.connection")
dbc.Open pDatabaseConnectionString 
QueryToJSON(dbc, query).Flush
%>
	