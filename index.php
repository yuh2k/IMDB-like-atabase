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
            <!-- <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="view_liked_movies">View All Liked Movies</button>
            </div> -->
        </form>
        <div class="mt-3">
            <table class='table table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <?php
                    if (isset($_POST['view_movies'])) {
                        echo "<th>ID</th>";
                        echo "<th>Name</th>";
                        echo "<th>Rating</th>"; 
                        echo "<th>Production</th>"; 
                        echo "<th>Budget</th>"; 
                        echo "<th>Awards</th>"; 
                        echo "<th>Roles</th>";
                        echo "<th>Like it!</th>"; 
                    } else if (isset($_POST['view_actors'])) {
                        echo "<th>Name</th>";
                        echo "<th>Nationality</th>"; 
                        echo "<th>DOB</th>";
                        echo "<th>Gender</th>";
                    } 
                    // else if (isset($_POST['view_liked_movies'])) {
                    //     echo "<th>Email</th>";
                    //     echo "<th>Movie Name</th>"; 
                    // } 
                    else {

                    }
                    
                    ?>
                </tr>
            </thead>

                <tbody>
                    <?php

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
                            $stmt = $conn->prepare("
                            SELECT mp.id, mp.name, mp.rating, mp.production, mp.budget, 
                            GROUP_CONCAT(DISTINCT a.award_name SEPARATOR ', ') AS awards,
                            GROUP_CONCAT(DISTINCT CONCAT(p.name, ': ', r.role_name) SEPARATOR '; ') AS roles
                            FROM
                                motionPicture mp
                            LEFT JOIN Award a ON mp.id = a.mpid
                            LEFT JOIN Role r ON mp.id = r.mpid
                            LEFT JOIN Movie m ON mp.id = m.id
                            LEFT JOIN People p ON p.id = r.pid
                            GROUP BY mp.id, mp.name, mp.rating, mp.production, mp.budget
                            ");
                            $stmt->execute();
    
                            // Set the resulting array to associative
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                            foreach($result as $row) {
                                echo "<tr>
                                    <td>".$row["id"]."</td> 
                                    <td>".$row["name"]."</td> 
                                    <td>".$row["rating"]."</td>
                                    <td>".$row["production"]."</td>
                                    <td>".$row["budget"]."</td>
                                    <td>".$row["awards"]."</td>
                                    <td>".$row["roles"]."</td>
                                    <td><button onclick='likeMovie(".$row["id"].")'>Like</button></td>
                                </tr>";
                            }
                        }
                        else if (isset($_POST['view_actors']))
                        {
                            $stmt = $conn->prepare("SELECT p.name, p.nationality, p.dob, p.gender FROM people p JOIN Role r ON p.id = r.pid WHERE role_name = 'Actor'"); // Adjust the field names as per your database
                            $stmt->execute();
    
                            // Set the resulting array to associative
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                            foreach($result as $row) {
                                echo "<tr>
                                    <td>".$row["name"]."</td>
                                    <td>".$row["nationality"]."</td>
                                    <td>".$row["dob"]."</td>
                                    <td>".$row["gender"]."</td>
                                </tr>";
                            }
                        }
                        else
                        {
                           
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
    <script>
        function likeMovie(movieId) {
            var userEmail = prompt("Please enter your email to like this movie:");
            if (!userEmail) {
                alert("You must enter an email to like a movie.");
                return;
            }

            var formData = new FormData();
            formData.append("email", userEmail);
            formData.append("movieId", movieId);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "handle_like.php", true);
            xhr.onload = function () {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert("Thank you for liking the movie!");
                    } else {
                        alert(response.message); 
                    }
                } else {
                    alert("An error occurred while processing your user information. Please try again.");
                }
            };
            xhr.send(formData);
        }
    </script>
</body>
</html>

