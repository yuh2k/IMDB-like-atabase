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
            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="list_all_tables">List All Tables</button>
            </div>



            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="search_motion_pictures">Search Motion Pictures</button>
            </div>
            <div style="margin-top: 20px;">
                <input type="text" name="search_text" placeholder="Enter Motion Picture Name" class="form-control">
            </div>

            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="search_liked_movies">Search Liked Movies</button>
            </div>
            <div style="margin-top: 20px;">
                <input type="email" name="user_email" placeholder="Enter Your Email" class="form-control">
            </div>

            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="search_by_country">Search by Country</button>
            </div>
            <div style="margin-top: 20px;">
                <input type="text" name="location_country" placeholder="Enter Shooting Location Country" class="form-control">
            </div>


            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="search_directors">Search Directors</button>
            </div>
            <div style="margin-top: 20px;">
                <input type="text" name="zip_code" placeholder="Enter Zip Code" class="form-control">
            </div>


            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="search_award_winners">Search Award Winners</button>
            </div>
            <div style="margin-top: 20px;">
                <input type="number" name="award_count" placeholder="Enter Minimum Award Count" class="form-control" min="1">
            </div>

            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="search_age_awards">Find Youngest and Oldest Award-Winning Actors</button>
            </div>

            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="search_producers">Search Producers</button>
            </div>
            <div style="margin-top: 20px;">
                <input type="number" name="box_office" placeholder="Enter Minimum Box Office Collection" class="form-control">
            </div>
            <div style="margin-top: 20px;">
                <input type="number" name="budget_limit" placeholder="Enter Maximum Budget" class="form-control">
            </div>

            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="search_multiple_roles">Search People with Multiple Roles</button>
            </div>
            <div style="margin-top: 20px;">
                <input type="number" name="rating_threshold" placeholder="Enter Rating Threshold" step="0.1" class="form-control">
            </div>


            <div style="margin-top: 20px;">
                <button class="btn btn-primary" type="submit" name="top2_thriller_movies">Find Top 2 Thriller Movies in Boston</button>
            </div>
            


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
                    else if (isset($_POST['list_all_tables'])) {
                        echo "<th>Table Names</th>"; 
                    } 
                    else if (isset($_POST['search_motion_pictures'])) {
                        echo "<th>Name</th>";
                        echo "<th>Rating</th>"; 
                        echo "<th>Production</th>";
                        echo "<th>Budget</th>";
                    } 
                    else if (isset($_POST['search_liked_movies'])) {
                        echo "<th>Name</th>";
                        echo "<th>Rating</th>"; 
                        echo "<th>Production</th>";
                        echo "<th>Budget</th>";
                    } 
                    else if (isset($_POST['search_by_country'])) {
                        echo "<th>Name</th>";
                    } 
                    else if (isset($_POST['search_award_winners']) && !empty($_POST['award_count'])) {
                        echo "<th>Name</th>";
                        echo "<th>Rating</th>"; 
                        echo "<th>Production</th>";
                        echo "<th>Budget</th>";
                    }
                    else if (isset($_POST['search_award_winners'])) {
                        echo "<th>Name</th>";
                        echo "<th>Motion Picture Name</th>";
                        echo "<th>Award Year</th>";
                        echo "<th>Award Count</th>";
                    } 

                    
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

                        if(isset($_POST['view_movies'])){
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
                        else if (isset($_POST['view_actors'])){
                            $stmt = $conn->prepare("SELECT p.name, p.nationality, p.dob, p.gender FROM people p JOIN Role r ON p.id = r.pid WHERE role_name = 'Actor'"); 
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
                        else if (isset($_POST['list_all_tables']))
                        {
                            $stmt = $conn->prepare("SHOW TABLES;");
                            $stmt->execute();
            
                            $result = $stmt->fetchAll(PDO::FETCH_NUM);
            
                            foreach ($result as $row) {
                                echo "<tr><td>".$row[0]."</td></tr>";
                            }
                        }
                        else if (isset($_POST['search_motion_pictures']) && !empty($_POST['search_text'])) {
                            $searchText = $_POST['search_text'];
                        
                            $stmt = $conn->prepare("
                                SELECT mp.name, mp.rating, mp.production, mp.budget
                                FROM motionPicture mp
                                WHERE mp.name LIKE :searchText
                            ");
                        
                            $stmt->execute([':searchText' => "%" . $searchText . "%"]);
                        
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                            foreach($result as $row) {
                                echo "<tr>
                                    <td>".$row["name"]."</td>
                                    <td>".$row["rating"]."</td>
                                    <td>".$row["production"]."</td>
                                    <td>".$row["budget"]."</td>
                                </tr>";
                            }
                        }
                        else if (isset($_POST['search_liked_movies']) && !empty($_POST['user_email'])) {
                            $userEmail = $_POST['user_email'];
                        
                            $stmt = $conn->prepare("
                                SELECT mp.name, mp.rating, mp.production, mp.budget
                                FROM motionPicture mp
                                JOIN likes l ON mp.id = l.mpid
                                WHERE l.uemail = :userEmail
                            ");
                        
                            $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
                            $stmt->execute();
                        
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                            foreach($result as $row) {
                                echo "<tr>
                                    <td>".$row["name"]."</td> 
                                    <td>".$row["rating"]."</td>
                                    <td>".$row["production"]."</td>
                                    <td>".$row["budget"]."</td>
                                </tr>";
                            }
                        }
                        else if (isset($_POST['search_by_country']) && !empty($_POST['location_country'])) {
                            $locationCountry = $_POST['location_country'];

                            $stmt = $conn->prepare("
                                SELECT DISTINCT mp.name
                                FROM motionPicture mp
                                JOIN Location l ON mp.id = l.mpid
                                WHERE l.country = :locationCountry
                                ORDER BY mp.name
                            ");

                            $stmt->bindParam(':locationCountry', $locationCountry, PDO::PARAM_STR);
                            $stmt->execute();

                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach($result as $row) {
                                echo "<tr><td>".$row["name"]."</td></tr>";
                            }
                        }
                        else if (isset($_POST['search_directors']) && !empty($_POST['zip_code'])) {
                            $zipCode = $_POST['zip_code'];
                        
                            $stmt = $conn->prepare("
                                SELECT DISTINCT pe.name AS director_name, mp.name AS tv_series_name
                                FROM People pe
                                JOIN Role r ON pe.id = r.pid
                                JOIN MotionPicture mp ON mp.id = r.mpid
                                JOIN Series s ON s.id = mp.id
                                JOIN Location l ON l.mpid = s.id
                                WHERE r.role_name = 'Director'
                                AND l.zip = :zipCode;
                            
                            ");
                        
                            $stmt->bindParam(':zipCode', $zipCode, PDO::PARAM_STR);
                            $stmt->execute();
                        
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                            foreach($result as $row) {
                                echo "<tr><td>".$row["director_name"]."</td><td>".$row["tv_series_name"]."</td></tr>";
                            }
                        }
                        else if (isset($_POST['search_award_winners']) && !empty($_POST['award_count'])) {
                            $k = $_POST['award_count'];
                        
                            $stmt = $conn->prepare("
                                SELECT 
                                    pe.name AS PersonName, 
                                    mp.name AS MotionPictureName, 
                                    a.award_year AS AwardYear, 
                                    COUNT(a.award_name) AS AwardCount
                                FROM 
                                    People pe
                                JOIN 
                                    Award a ON pe.id = a.pid
                                JOIN 
                                    MotionPicture mp ON mp.id = a.mpid
                                GROUP BY 
                                    pe.name, mp.name, a.award_year
                                HAVING 
                                    COUNT(a.award_name) > :k;
                            ");
                        
                            $stmt->bindParam(':k', $k, PDO::PARAM_INT);
                            $stmt->execute();
                        
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                            foreach($result as $row) {
                                echo "<tr>
                                    <td>".$row["PersonName"]."</td>
                                    <td>".$row["MotionPictureName"]."</td>
                                    <td>".$row["AwardYear"]."</td>
                                    <td>".$row["AwardCount"]."</td>
                                </tr>";
                            }
                        }
                        else if (isset($_POST['search_age_awards'])) {
                            $stmtYoungest = $conn->prepare("
                                SELECT pe.name AS ActorName, mp.name AS MotionPictureName,
                                (a.award_year - YEAR(pe.dob)) AS AgeAtAward
                                FROM People pe
                                INNER JOIN Role r ON pe.id = r.pid AND r.role_name = 'Actor'
                                INNER JOIN Award a ON pe.id = a.pid
                                INNER JOIN MotionPicture mp ON a.mpid = mp.id
                                ORDER BY AgeAtAward ASC
                                LIMIT 1
                            ");
                            $stmtYoungest->execute();
                            $youngest = $stmtYoungest->fetch(PDO::FETCH_ASSOC);
                        
                            $stmtOldest = $conn->prepare("
                                SELECT pe.name AS ActorName, a.award_year AS AwardYear,
                                (a.award_year - YEAR(pe.dob)) AS AgeAtAward
                                FROM People pe
                                INNER JOIN Role r ON pe.id = r.pid AND r.role_name = 'Actor'
                                INNER JOIN Award a ON pe.id = a.pid
                                INNER JOIN MotionPicture mp ON a.mpid = mp.id
                                ORDER BY AgeAtAward DESC
                                LIMIT 1
                            ");
                            $stmtOldest->execute();
                            $oldest = $stmtOldest->fetch(PDO::FETCH_ASSOC);
                        
                            echo "<h2>Youngest Award-Winning Actor</h2>";
                            echo "<table class='table table-bordered'>
                                <thead class='thead-dark'><tr>
                                <th>Name</th>
                                <th>Age at Award</th>
                                </tr></thead>";
                            echo "<tbody>";
                            echo "<tr>
                                <td>".$youngest["ActorName"]."</td>
                                <td>".$youngest["AgeAtAward"]."</td>
                                </tr>";
                            echo "</tbody></table>";
                        
                            echo "<h2>Oldest Award-Winning Actor</h2>";
                            echo "<table class='table table-bordered'>
                                <thead class='thead-dark'><tr>
                                <th>Name</th>
                                <th>Age at Award</th>
                                </tr></thead>";
                            echo "<tbody>";
                            echo "<tr>
                                <td>".$oldest["ActorName"]."</td>
                                <td>".$oldest["AgeAtAward"]."</td>
                                </tr>";
                            echo "</tbody></table>";
                        }
                        else if (isset($_POST['search_producers'])) {
                            $boxOffice = $_POST['box_office'];
                            $budgetLimit = $_POST['budget_limit'];
                        
                            $stmt = $conn->prepare("
                                SELECT 
                                    p.name AS ProducerName, 
                                    mp.name AS MovieName, 
                                    m.boxoffice_collection, 
                                    mp.budget
                                FROM 
                                    People p
                                JOIN 
                                    Role r ON p.id = r.pid AND r.role_name = 'Producer'
                                JOIN 
                                    MotionPicture mp ON r.mpid = mp.id
                                JOIN 
                                    Movie m ON mp.id = m.id
                                WHERE 
                                    p.nationality = 'USA' AND
                                    m.boxoffice_collection >= :boxOffice AND 
                                    mp.budget <= :budgetLimit
                            ");
                        
                            $stmt->bindParam(':boxOffice', $boxOffice, PDO::PARAM_INT);
                            $stmt->bindParam(':budgetLimit', $budgetLimit, PDO::PARAM_INT);
                            $stmt->execute();
                            
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                            if ($result) {
                                echo "<h2>Search Results</h2>";
                                echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Producer Name</th><th>Movie Name</th><th>Box Office Collection</th><th>Budget</th></tr></thead>";
                                echo "<tbody>";
                                foreach($result as $row) {
                                    echo "<tr><td>".$row["ProducerName"]."</td><td>".$row["MovieName"]."</td><td>".$row["boxoffice_collection"]."</td><td>".$row["budget"]."</td></tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No results found matching your criteria.</p>";
                            }
                        }
                        else if (isset($_POST['search_multiple_roles'])) {
                            $ratingThreshold = $_POST['rating_threshold'];
                        
                            $stmt = $conn->prepare("
                                SELECT 
                                    p.name AS PersonName, 
                                    mp.name AS MotionPictureName, 
                                    COUNT(r.role_name) AS RoleCount
                                FROM 
                                    People p
                                JOIN 
                                    Role r ON p.id = r.pid
                                JOIN 
                                    MotionPicture mp ON r.mpid = mp.id
                                WHERE 
                                    mp.rating > :ratingThreshold
                                GROUP BY 
                                    p.id, mp.id
                                HAVING 
                                    COUNT(r.role_name) > 1
                            ");
                        
                            $stmt->bindParam(':ratingThreshold', $ratingThreshold, PDO::PARAM_STR);
                            $stmt->execute();
                            
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($result) {
                                echo "<h2>People with Multiple Roles in High-Rated Motion Pictures</h2>";
                                echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Person's Name</th><th>Motion Picture Name</th><th>Count of Roles</th></tr></thead>";
                                echo "<tbody>";
                                foreach($result as $row) {
                                    echo "<tr><td>".$row["PersonName"]."</td><td>".$row["MotionPictureName"]."</td><td>".$row["RoleCount"]."</td></tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No results found matching your criteria.</p>";
                            }
                        }
                        else if (isset($_POST['top2_thriller_movies'])) {
                            $stmt = $conn->prepare("
                            SELECT 
                                mp.name AS MovieName, 
                                mp.rating AS Rating
                            FROM 
                                MotionPicture mp
                            JOIN 
                                Genre g ON mp.id = g.mpid
                            JOIN 
                                Location l ON mp.id = l.mpid
                            WHERE 
                                g.genre_name = 'Thriller' AND 
                                l.city = 'Boston' AND 
                                mp.id NOT IN (
                                    SELECT 
                                        mp.id
                                    FROM 
                                        MotionPicture mp
                                    JOIN 
                                        Location l ON mp.id = l.mpid
                                    WHERE 
                                        l.city <> 'Boston'
                                )
                            GROUP BY 
                                mp.id
                            ORDER BY 
                                mp.rating DESC
                            LIMIT 2
                        ");
                        $stmt->execute();
    
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                        if ($result) {
                            echo "<h2>Top 2 Rated Thriller Movies Shot Exclusively in Boston</h2>";
                            echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Movie Name</th><th>Rating</th></tr></thead>";
                            echo "<tbody>";
                            foreach($result as $row) {
                                echo "<tr><td>".$row["MovieName"]."</td><td>".$row["Rating"]."</td></tr>";
                            }
                            echo "</tbody></table>";
                        } else {
                            echo "<p>No thriller movies found that were shot exclusively in Boston.</p>";
                        }
    
                        }
                        
                
                        
                        else {

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

