<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Due: August 4th, 2021
Help Page 
-->       
<!-- (c) 2021 Shane Tracey. All Rights Reserved. -->    
    
<head>
<meta charset="utf-8">
<meta name="author" content="Shane Tracey">
<meta name="keywords" content="html, forms, education, assignment">
<meta name="description" content="Final project of Advanced Website Design">
<meta name="viewport" content= "width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/index.css">
<script src="js/index.js" type="text/javascript"></script>
<title> Gains Tracker </title>
    
</head>

<body>
    

<?php 

$username = "";

if (!empty($_POST["username"]))
{
$username = $_POST["username"]; // make index.php sign in form action to homePage.php (this form)
}
else
  {
    header("Location:index.php");
    exit();
  }
//$username = "shaner"; 
$quote = "Dreams don't work unless you do!";
?>
<!-- Page menu bar-->
<div class="main_header">
<!-- might have to pass userName to each page once logged in -->
    <img id="h_logo_header" src="images/AWD_fp_1.png" alt="Gains Tracker Logo">
    <button id="sign_out_button" onclick="location.href='index.php'" type="button"> Sign Out </button>
  <form id="help_buttonf" method="post" action="help.php">
  <input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
  <button id="help_button" type="submit"> Help </button>
  </form>
  <form id="about_buttonf"method="post" action="about.php">
  <input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
  <button id="about_button" type="submit"> About </button>
  </form>
  <form id="home_buttonf" method="post" action="homePage.php">
  <input name='username' id='username' type="hidden" value="<?php echo $username; ?> ">
  <button id="home_button" type="submit"> Home </button>
  </form>
  
  </div>


<!--headers -->
<div class="headers">
<h3 id="h_text2">Help </h3>
    <h3 id="h_text">We're Here to Help! </h3>
    </div>

    <div class="help_content">
        <h2>FAQ's:</h2><br>
        <p class="subtitle"> How do I start?</p><p> Once you have successfully signed up and logged in, you'll be directed to the home page. There you can select one of the following buttons: Begin Workout, Goals, Personal Bests, Previous Workouts, and Progress. Since you are just starting, there won't be any data set for the Personal Bests, Previous Workouts, and Progress pages. Your first step would be to log your first workout or create your first health and fitness goal.</p>
        <p class="subtitle">  How do I view my workout after I logged it?</p><p> Once you have successfully logged a workout, you'll be able to view it from the Previous Workouts page. You can get there from the home page by clicking the "Previous Workout" button. From there you'll see a list of your previous workouts along with an option to view to see more details.</p>
        <p class="subtitle"> Why wasn't the workout I logged saved to my records?</p><p> Whenever you see the "Something went wrong ..." error message from the Begin Workout page it is usually related to issues arrising from inserting data into our database. Please check to make sure all your form fields are using the correct format. Also make sure you either input/select nothing for cardio or select/input all fields for cardio.</p>
        <p class="subtitle"> Why aren't all my fitness and health goals showing on the Goals page?</p><p> When you initially visit the Goals page, all your goals are pulled from the database and displayed. As you add goals, they are also displayed to the page. The added goals aren't saved to the database until you click the "Save Changes" button. Leaving the page prior to clicking that button will result in the new goals being lost.</p>
        <p class="subtitle"> Why am I getting this error message "can't open the page ... sever unexpectedly dropped the connection."?</p><p> This is a common error with the Safari. If you switch your browser, you shouldn't get that error again. The reccommended browser for Gains Tracker is Google Chrome.</p>
        <p class="subtitle"> How do I change my username?</p><p> After you create your username during the sign up process, it cannot be changed. A feature to change a user's username will be implemented in the near future.</p>
        <p class="subtitle"> What is the Personal Bests page for?</p><p> The Personal Bests page is meant to keep track of you bests when it comes to your workouts. For exercises, the heaviest weight will be considered your PB (personal best). For cardio, the longest duration and longest distance will be considered your PB. Tracking personal bests is a great way to motivate yourself and recognize progress.</p>
        <p class="subtitle"> Why can't I submit a workout?</p><p> Once on the Begin Workout page, only two critea must be met to submit a workout.<br> 1) Workout has to include at least 1 exercise <br> 2) All form fields must be filled out (Cardio fields are optional) <br> Ensure both criteria are met and you should then be able to submit your workout.</p>
        <br><br>
    </div>

    <h3 class="default_header">Quick Run through of some of the site's features. </h3>
  <div class="tutorial">
  <video width="80%" height="50%" controls>
  <source src="video/GT_tutorial_final.mp4" type="video/mp4">
</video>
</div>

</body>
    
</html>
