<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1.2</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center">My IMDB</h1>
        <form method="post">
            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="view_movies">View All Movies</button>
            </div>
            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="view_actors">View All Actors</button>
            </div>
        </form>
        <div class="mt-3">
            <table class='table table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <?php
                    if (isset($_POST['view_movies'])) {
                        echo "<th>Title</th>";
                        echo "<th>Rating</th>"; 
                        echo "<th>Production</th>"; 
                    } elseif (isset($_POST['view_actors'])) {
                        echo "<th>Name</th>";
                        echo "<th>Nationality</th>"; 
                        echo "<th>DOB</th>";
                    } else {

                    }
                    ?>
                </tr>
            </thead>

                <tbody>
                    <?php

                    // Enable error reporting for debugging
                    error_reporting(E_ALL);
                    ini_set("display_errors", 1);

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "COSI127b";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        if(isset($_POST['view_movies']))
                        {
                            $stmt = $conn->prepare("SELECT name, rating, production FROM motionPicture"); // Adjust the field names as per your database
                            $stmt->execute();
    
                            // Set the resulting array to associative
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                            foreach($result as $row) {
                                echo "<tr>
                                    <td>".$row["name"]."</td> 
                                    <td>".$row["rating"]."</td>
                                    <td>".$row["production"]."</td>
                                </tr>";
                            }
                        }
                        else if (isset($_POST['view_actors']))
                        {
                            $stmt = $conn->prepare("SELECT name, nationality, dob FROM people"); // Adjust the field names as per your database
                            $stmt->execute();
    
                            // Set the resulting array to associative
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                            foreach($result as $row) {
                                echo "<tr>
                                    <td>".$row["name"]."</td>
                                    <td>".$row["nationality"]."</td>
                                    <td>".$row["dob"]."</td>
                                </tr>";
                            }
                        }
                        else
                        {
                            // Nothing should be displayed here
                        }


                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
