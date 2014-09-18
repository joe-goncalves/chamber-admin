<!--#include file="../../includes/databaseFunctions.asp"-->
<!--#include file = "../../../../includes/settings_wwjc.asp"-->
<!--#include file="JSON_2.0.4.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->

<%
dim query, dbc, task
task = request.querystring("task")
if task = 2 then
	query = "SELECT memberName, memberLevel, pkid FROM member WHERE active = 1 and memberSuspended = 0 order by memberName"
elseif task = 3 then 
	query = "SELECT memberName, memberLevel, pkid FROM member WHERE active = 1 and memberSuspended = 1 order by memberName"
elseif task = 1 then 
	query = "SELECT memberName, memberLevel, pkid FROM member WHERE active = 0 and memberSuspended = 0 order by memberName"
end if


set dbc = server.createObject("adodb.connection")
dbc.Open pDatabaseConnectionString 


QueryToJSON(dbc, query).Flush
%>