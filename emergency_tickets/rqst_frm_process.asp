<% dim connTemp, rsTemp, mySQL, timd %>
<!--#include file = "../../../includes/settings_wwjc.asp"-->
<!--#include file="../../../includes/databaseFunctions.asp"-->
<%
Dim mailFrom, mailTo, mailSubject, mailMessage, mailServer, mailUsername, mailPassword, rqstr_nm, rqst_txt
rqstr_nm = request.form("rqstr_nm")
rqstr_eml = request.form("rqstr_eml")
rqst_txt = request.form("rqst_txt")
 mailSubject = "Emergency Request From: " & rqstr_nm
 mailMessage = "<html><body><h2>Chamber Request Expedited</h2><p>"&rqstr_nm&" writes:</p><pre>"&rqst_txt&"</pre><br/><em>Have this done in 24 hours</em><br/><br/>REQUESTER'S EMAIL:  "&rqstr_eml&"</body><html>"
sendUrl="http://schemas.microsoft.com/cdo/configuration/sendusing"
smtpUrl="http://schemas.microsoft.com/cdo/configuration/smtpserver"


' Set the mail server configuration
Set objConfig=CreateObject("CDO.Configuration")
objConfig.Fields.Item(sendUrl)=2 ' cdoSendUsingPort
objConfig.Fields.Item(smtpUrl)="relay-hosting.secureserver.net"
objConfig.Fields.Update
' Create and send the mail
Set objMail=CreateObject("CDO.Message")
' Use the config object created above
Set objMail.Configuration=objConfig
objMail.From="info@ronkonkomachamber.com"
objMail.ReplyTo="info@ronkonkomachamber.com"
objMail.To="joe.a.goncalves@gmail.com"
objMail.Subject = mailSubject
objMail.htmlbody = mailMessage
objMail.Send
' insert record of the request into db. 
Dim timestamp
timestamp = Now
mySQL="INSERT INTO emergency_request (requester_name, requester_email, request_text, stamp) values ('"&rqstr_nm&"','"&rqstr_eml&"','"&rqst_txt&"','"&timestamp&"')"
call updateDatabase (mySQL, rsTemp, "logRqst")  

%>
 