<?php 

      $ServerName = "localhost:3307";
      $UserName = "root";
      $Password = "";
      $DataName = "utopia_website";
      
      // Create connection
      $conn = mysqli_connect($ServerName, $UserName, $Password, $DataName);
      
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      return $conn;
