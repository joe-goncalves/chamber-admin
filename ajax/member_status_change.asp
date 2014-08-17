<!--#include file="../includes/databaseFunctions.asp"-->
<!--#include file = "../../../includes/settings_wwjc.asp"-->
<!--#include file="JSON_2.0.4.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->

<%
dim query, dbc, memberid, task
memberid = request.form("mbrID")
task = request.form("task")
if task = "delete" then
	' since no other action calls for suspension on inactive members we will us this combination to indicate that a member has been deleted in case his/her info needs to ever be retreived.
	query = "UPDATE member SET memberSuspended = 1, active = 0 WHERE pkid = " + memberid 
elseif task = "suspend" then 
	query = "UPDATE member SET memberSuspended = 1, active = 1 WHERE pkid = " + memberid
elseif task = "unsuspend" then 
	query = "UPDATE member SET memberSuspended = 0, active = 1 WHERE pkid = " + memberid
end if
response.write(query)
call updateDatabase(query, rsTemp, "") 
%>