<!--#include file="../../includes/databaseFunctions.asp"-->
<!--#include file = "../../../../includes/settings_wwjc.asp"-->
<!--#include file="JSON_2.0.4.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->

<%
dim query, dbc
query = "SELECT eventTypeId as 'id', eventType as 'name' FROM  eventType"

' creates connecetion object
set dbc = server.createObject("adodb.connection")
dbc.Open pDatabaseConnectionString 


QueryToJSON(dbc, query).Flush
%>