<!--#include file="../includes/databaseFunctions.asp"-->
<!--#include file = "../../../includes/settings_wwjc.asp"-->
<!--#include file="JSON_2.0.4.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->

<%
dim query, dbc, eventid
eventid = request.querystring("eventid")
query = "SELECT eventName, eventDate, eventTime, eventLoc,  eventDesc, eventPrice, pkid  FROM event WHERE pkid = " + eventid

' creates connecetion object
set dbc = server.createObject("adodb.connection")
dbc.Open pDatabaseConnectionString 


QueryToJSON(dbc, query).Flush
%>
