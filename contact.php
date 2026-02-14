<?php  
session_start();

?>


<!DOCTYPE html>
<html>
<head>
  <title>Contact Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    * {
      box-sizing: border-box;
    }
    
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }
    
    .container {
      max-width: 500px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .container h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #666;
      font-weight: bold;
    }
    
    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #f9f9f9;
      resize: vertical;
    }
    
    .form-group textarea {
      height: 120px;
    }
    
    .form-group input:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: #4CAF50;
    }
    
    .form-group .error-message {
      color: #ff0000;
      font-size: 14px;
      margin-top: 5px;
    }
    
    .form-group .success-message {
      color: #4CAF50;
      font-size: 14px;
      margin-top: 5px;
    }
    
    .form-group .checkbox-label {
      display: flex;
      align-items: center;
      margin-top: 10px;
    }
    
    .form-group .checkbox-label input[type="checkbox"] {
      margin-right: 5px;
    }
    
    .form-group .submit-button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    
    .form-group .submit-button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  
<?php
  include("connection.php");
  if (  $_SESSION['Loggedin']=1    ) {
       
if(isset($_POST['submit']) ){


  $name = $_POST["conname"];
  $email = $_POST["conemail"];
  $message = $_POST["conmessage"];
  $insert="INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
  $run=mysqli_query($conn,$insert);
      

    if ($run) {
     
      $alertType = 'success'; // Set the type of alert (success, danger, warning, info)

      $message = 'Your message has been sent'; // Set the message for the alert

      // Generate the HTML markup for the alert
      $html = '<div class="alert alert-' . $alertType . '" role="alert">';
      $html .= $message;
      $html .= '</div>';

      // Output the alert
      echo $html;
      
    }
    else {
      echo"login first";
    }
    }
}
  
  ?>



  <div class="container">
    <h1>Contact Us</h1>
    <form id="contact-form" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="conname" required>
        <div class="error-message"></div>
      </div>
      
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="conemail" required>
        <div class="error-message"></div>
      </div>
      
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea id="message" name="conmessage" required></textarea>
        <div class="error-message"></div>
      </div>
      
   
      
      <div class="form-group">
        <button  type="submit" name="submit" class="submit-button">Submit</button>
        <div class="success-message"></div>
      </div>
    </form>
  </div>
  
  
  
  
  
<!--  
  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.139448255308!2d67.03085831495628!3d24.927318984022378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f90157042d3%3A0x93d609e8bec9a880!2sAptech%20Computer%20Education%20North%20Nazimabad%20Center!5e0!3m2!1sen!2s!4v1667412034993!5m2!1sen!2s"
                    width="1499" height="499" style="border: 30px;text-align: center;" allowfullscreen="" loading="fast"
                    referrerpolicy="no-referrer-when-downgrade"></iframe> -->
</body>
</html>
