<!--#include file="../includes/databaseFunctions.asp"-->
<!--#include file = "../../../includes/settings_wwjc.asp"-->
<!--#include file="JSON_2.0.4.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->

<%
dim memberName, memberDesc, memberCatID, memberTown, memberZip, memberState, memberContactName, memberContactNum, memberContactFaxNum, msg, memberContactEmail, memberWebsite, memberLevel, memberYrsInArea, memberStreetAddress, memberStreetAddress2, memberNoEmp, insert, update
memberName = scrubForDB("memberName")
memberCatID = scrubForDB("memberCatID")
memberContactName =  scrubForDB("memberContactName")
memberContactFaxNum =  scrubForDB("memberContactFaxNum")
memberWebsite =  scrubForDB("memberWebsite")
memberStreetAddress =  scrubForDB("memberStreetAddress")
memberNoEmp =  scrubForDB("memberNoEmp")
memberStreetAddress2 =  scrubForDB("memberStreetAddress2")
memberTown =  scrubForDB("memberTown")
memberState =  scrubForDB("memberState")
memberYrsInArea =  scrubForDB("memberYrsInArea")
memberZip =  scrubForDB("memberZip")
memberContactNum =  scrubForDB("memberContactNum")
memberContactEmail =  scrubForDB("memberContactEmail")
memberDesc =  scrubForDB("memberDesc")
memberLevel =  scrubForDB("memberLevel")
pkid = request.Querystring("pkid")
insert = "INSERT INTO member (memberName, memberDesc, memberCatID, memberTown, memberZip, memberState, memberContactName, memberContactNum, memberContactFaxNum, memberContactEmail, memberWebsite, memberLevel, memberYrsInArea, memberStreetAddress, memberStreetAddress2, memberNoEmp) VALUES ('" & memberName & "', '" & memberDesc & "', '" & memberCatID & "', '" & memberTown & "', '" & memberZip & "', '" & memberState & "', '" & memberContactName & "', '" & memberContactNum & "', '" & memberContactFaxNum & "', '" & memberContactEmail & "', '" & memberWebsite & "', '" & memberLevel & "', '" & memberYrsInArea & "', '" & memberStreetAddress & "', '" & memberStreetAddress2 & "', '" & memberNoEmp & "')"
update = "UPDATE member SET memberName = '" & memberName & "', memberDesc = '" & memberDesc & "', memberCatID = '" & memberCatID & "', memberTown = '" & memberTown & "', memberZip = '" & memberZip & "', memberState = '" & memberState & "', memberContactName = '" & memberContactName & "', memberContactNum = '" & memberContactNum & "',memberContactFaxNum = '" & memberContactFaxNum & "', memberContactEmail = '" & memberContactEmail & "', memberWebsite = '" & memberWebsite & "', memberLevel = '" & memberLevel & "', memberYrsInArea = '" & memberYrsInArea & "', memberStreetAddress = '" & memberStreetAddress & "', memberStreetAddress2 = '" & memberStreetAddress2 & "', memberNoEmp = '" & memberNoEmp & "' WHERE pkid = "  + pkid
If pkid>1 Then 
	mySQL = update
	msg = memberName & " has been updated"
Else 
	mySQL = insert
	msg = memberName & " has been added"
End if
call updateDatabase(mySQL, rsTemp, "member action")
response.write (msg)

function scrubForDB(val)
scrubForDB = replace(Trim(request.form(val)), "'", "''")
end function



%>