<!DOCTYPE html>
<html>
<head>
<!--#INCLUDE FILE = "settings.asp" -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META name="description" content="<%=MetaTitle%>">
<META name="keywords" content="">
<title><%=Title%></title>
<link rel="stylesheet" type="text/css" href="<%=host_url%>/includes/css_pirobox/style_1/style.css"/>
<link rel="stylesheet" href="<%=host_url%>/includes/styles.css" type="text/css" />
</head>
<body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="<%=host_url%>/includes/js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="<%=host_url%>/includes/js/pirobox_extended.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $().piroBox_ext({
        piro_speed : 900,
        bg_alpha : 0.1,
        piro_scroll : true //pirobox always positioned at the center of the page
    });
});
</script>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=468937846471861";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<%
	dim connTemp, rsTemp, mySQL, timd
		timd=dateadd("n", -30, dateadd("h",2, now()))
		mySQL="SELECT TOP 1 weatherTime FROM weather ORDER BY weatherTIme DESC"
		call getFromDatabase (mySQL, rsTemp, "listOfweather")
		weatherTime_hodlr=rsTemp("weatherTIme")
    if timd > weatherTime_hodlr then %>
    	<script>
					$(document).ready(function(){
							//console.log("should do ajax call");
							$.ajax({
								url: "http://api.wunderground.com/api/767da853649d5e3f/hourly/q/NY/Ronkonkoma.json",
								crossDomain: true,
								dataType: "jsonp"
							})
							.success(function (data, textStatus, jqXHR){
								$.post("<%=host_url%>/includes/updateweather.asp", {temp: data.hourly_forecast[0].temp.english, icon: data.hourly_forecast[0].icon_url})
							});
							<%mySQL="SELECT TOP 1 * FROM weather ORDER BY weatherTIme DESC"
							call getFromDatabase (mySQL, rsTemp, "listOfweather")%>
								$("#little_temp").append("<span><%=rsTemp("weatherTemp")%>°</span>");
								$("#little_temp").append("<img src='<%=rsTemp("weatherCond")%>'/>");	
					});	
			</script>
			<%else%>
      <script>
			$(document).ready(function(){
				//console.log("you should query the db and print that");
				<%mySQL="SELECT TOP 1 * FROM weather ORDER BY weatherTIme DESC"
				call getFromDatabase (mySQL, rsTemp, "listOfweather")%>
				$("#little_temp").append("<span><%=rsTemp("weatherTemp")%>°</span>");
				$("#little_temp").append("<img src='<%=rsTemp("weatherCond")%>'/>");		
			});
				
      </script>
   		<%end if%>

<div id="full">
<a href="<%=host_url%>" id="head_img">
<img src="<%= host_url%>/images/logo13.png" style="z-index: 1000;position: absolute;margin-top: -39px;margin-left: -60px;"/>
</a>
<div id="main">
  <div id="logo_bnr_spc">
      <div id="little_temp"></div>
      <div class="clear"></div>
      <!--a href="<%=host_url%>/default_555.asp"><img id="home_btn" src="<%= host_url%>/images/homebutton.png"/></a-->
</div>
  <div class="clear"></div>
<div id="nav">
	<ul class="main_nav">
       <li>
            <a href="<%=host_url%>/member/member_by_category.asp">Members</a>
            <ul class="sub_nav">
                <li><a href="<%=host_url%>/member/member_by_category.asp">Browse By Category</a></li>
                <li><a href="<%=host_url%>/member/member_by_name.asp">Browse By Name</a></li>
            </ul>
        </li>
        <li>
            <a href="<%=host_url%>/about_chamber/our_mission.asp">About The Chamber</a>
            <ul class="sub_nav">
                <li><a href="<%=host_url%>/about_chamber/our_mission.asp">Our Misson</a></li>
		<li><a href="<%=host_url%>/about_chamber/message_from_president.asp">President's Message</a></li>
                <li><a href="<%=host_url%>/about_chamber/officers_and_directors.asp">Chamber Officers and Directors</a></li>
                <li><a href="<%=host_url%>/about_chamber/advertise.asp">Advertise With Us</a></li>
                <li><a href="<%=host_url%>/about_chamber/super_saver.asp">Super Saver Program</a></li>
            </ul>
        </li>
        <li>
            <a href="<%=host_url%>/event_calendar/upcoming_event_list.asp">Events &amp; Meetings</a>
            <ul class="sub_nav">
                <li><a href="<%=host_url%>/event_calendar/upcoming_event_list.asp">Upcoming Events &amp; Meetings</a></li>
		<li><a href="<%=host_url%>/event_calendar/past_event_list.asp">Past Events &amp; Meetings</a></li>
            </ul>
        </li>
        <li>
            <a href="<%=host_url%>/about_ronkonkoma/orignal_residents.asp">About Ronkonkoma</a>
            <ul class="sub_nav">
                <li><a href="<%=host_url%>/about_ronkonkoma/orignal_residents.asp">Original Residents and Early Settlers</a></li>
								<li><a href="<%=host_url%>/about_ronkonkoma/summer_resort.asp">Summer Resort</a></li>
                <li><a href="<%=host_url%>/about_ronkonkoma/myths_and_legends.asp">Myths and Legends</a></li>
								<li><a href="<%=host_url%>/about_ronkonkoma/the_future.asp">The Future</a></li>
            </ul>   
        </li>
        <li>
            <a href="<%=host_url%>/join_renew/membership_types.asp" id="last_nav_tab">Membership</a>
            <ul class="sub_nav">
                <li><a href="<%=host_url%>/join_renew/membership_types.asp">Membership Details</a></li>
		<li><a href="<%=host_url%>/join_renew/form.asp">Begin or Renew your Membership</a></li>
            </ul>   
        </li>
    </ul>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!--#INCLUDE FILE = "../includes/side.asp" -->
<div id="content">