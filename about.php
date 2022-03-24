<!DOCTYPE html>
<html lang="en">
<!--
Final Project (Individual)
Class: Advanced Website Design
Name: Shane Tracey
Due: August 4th, 2021
About Page 
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
    <h3 id="h_text2">About Us! </h3>
    <img id="h_logo" src="images/AWD_fp_2.png" alt="Gains Tracker Logo">
    </div>

    <div class="about_content">
        <h2>What is Gains Tracker?</h2><br>
        <p> It can be tough to stay motivated in the gym, sometimes it feels like your progress has plateaued. That is where gains Tracker can help. It can keep you focused, motivated and in shape. Gains Tracker is an online tool that helps you track your workout any where you have an internet connection.
        </p>
        <br><br>
        <p>Gains Tracker is a free online workout tracking tool. It can log workouts, view previous workouts, keep track of personal bests, set and view fitness goals, and provide graphics based on your workout progress. The demographic is anyone 14 years old or older and is interested in their health and fitness.</p>
        <br><br>
        <p>Benefits of Gains tracker include, increased motivation, efficient progressive overloading (a technique used to grow muscle where you gradually increase weight, and repetitions in your exercises), quicker workouts, increased workout consistency, and higher chances of achieving fitness goals.</p>
        <br><br>
        <p>The meaning behind Gains Tracker. The word “gains” is a positive slang term used in the fitness community that means “muscle growth through working out”. The word “tracker” means “a person who tracks something or someone on a trail”. As you can see, putting these meanings together make the name self-explanatory to the tool. </p>
        <br><br>
        <p>Have you ever wanted to achieve a specific fitness goal? Everytime you start working out, do you quickly lose motivation? Do you tend to forget the exercises in a specific workout? Did you forget how much weight you use for bench press? Did you forget what type of workout you did last week?<br> If you answered yes to any of these questions, it's time to start using Gains Tracker.</p>
        <br><br>
    </div>

    <br>
    <div class="fpd">
    <button id="ca" onclick="location.href='index.php'" type="button"> Sign in</button>
    </div> 
    <br>

</body>
    
</html>
