<!--#include file="../includes/databaseFunctions.asp"-->
<!--#include file = "../../../includes/settings_wwjc.asp"-->
<!--#include file="JSON_2.0.4.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->

<%
dim query, dbc, task
query="SELECT * FROM ticketDetails left join event on ticketDetails.eventId = event.pkid WHERE active='true' order by eventDate desc"
set dbc = server.createObject("adodb.connection")
dbc.Open pDatabaseConnectionString 
QueryToJSON(dbc, query).Flush
%>





