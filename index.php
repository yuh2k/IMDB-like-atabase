<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1.2</title>
</head>
<body>
    <div class="container">
    <header class="site-header">
        <img src="static/images/imdb.png" alt="IMDB Logo" class="logo">
        <h1><b>MY <i>IMDb</i></b></h1>
        <br>
        
    </header>

        <div class="row">
            <div class="col-md-3">
                <form method="post">

                <div class="card">
                    <div class="card-body">
                        <div>
                            <button class="btn btn-primary" type="submit" name="list_all_tables">List All Tables</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <input type="text" name="search_text" placeholder="Enter Motion Picture Name" class="form-control">
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" name="search_motion_pictures">Search Motion Pictures</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <input type="email" name="user_email" placeholder="Enter Your Email" class="form-control">
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" name="search_liked_movies">Search Liked Movies</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <input type="text" name="location_country" placeholder="Enter Shooting Location Country" class="form-control">
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" name="search_by_country">Search by Country</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <input type="text" name="zip_code" placeholder="Enter Zip Code" class="form-control">
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" name="search_directors">Search Directors</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <input type="number" name="award_count" placeholder="Enter Minimum Award Count" class="form-control" min="1">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit" name="search_award_winners">Search Award Winners</button>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <button class="btn btn-primary" type="submit" name="search_age_awards">Find Youngest and Oldest Award-Winning Actors</button>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <input type="number" name="box_office" placeholder="Enter Minimum Box Office Collection" class="form-control">
                    </div>
                    <div>
                        <input type="number" name="budget_limit" placeholder="Enter Maximum Budget" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit" name="search_producers">Search Producers</button>
                    </div>
                </div>

                <div class="card">

                    <div>
                        <button class="btn btn-primary" type="submit" name="search_multiple_roles">Search People with Multiple Roles</button>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <input type="number" name="rating_threshold" placeholder="Enter Rating Threshold" step="0.1" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit" name="search_multiple_roles">Search People with Multiple Roles</button>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <button class="btn btn-primary" type="submit" name="top2_thriller_movies">Find Top 2 Thriller Movies in Boston</button>
                    </div>
                </div>
                    
                <div class="card">
                    <div>
                        <input type="number" name="likes_threshold" placeholder="Enter Minimum Number of Likes" class="form-control">
                    </div>
                    <div>
                        <input type="number" name="age_limit" placeholder="Enter Maximum Age" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit" name="search_movies_by_likes">Search Movies</button>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <button class="btn btn-primary" type="submit" name="search_marvel_warner">Search Actors in Both Marvel and Warner Bros Productions</button>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <button class="btn btn-primary" type="submit" name="search_higher_than_comedy_avg">Movies Rated Higher Than Comedy Average</button>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <button class="btn btn-primary" type="submit" name="search_top_movies_by_roles">Top 5 Movies by Role Participation</button>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <button class="btn btn-primary" type="submit" name="search_actors_with_same_birthday">Find Actors with the Same Birthday</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-8">
                <div class="table-responsive mt-3">
                    <table class='table table-bordered'>
                        <thead class='thead-dark'>
                            <tr>
                            <?php
                            if (isset($_POST['list_all_tables'])) {
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
                                // Leave blank for no clicking anything
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

                        if (isset($_POST['list_all_tables']))
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
                                FROM MotionPicture mp
                                JOIN Movie m ON mp.id = m.id
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
                                FROM MotionPicture mp
                                JOIN Movie m ON mp.id = m.id
                                JOIN Likes l ON mp.id = l.mpid
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
                                SELECT 
                                    pe.name AS ActorName, 
                                    mp.name AS MotionPictureName, 
                                    pe.dob AS DateOfBirth,
                                    TIMESTAMPDIFF(YEAR, pe.dob, CONCAT(a.award_year, '-01-01')) AS AgeAtAward
                                FROM 
                                    People pe
                                INNER JOIN 
                                    Role r ON pe.id = r.pid AND r.role_name = 'Actor'
                                INNER JOIN 
                                    Award a ON pe.id = a.pid
                                INNER JOIN 
                                    MotionPicture mp ON a.mpid = mp.id
                                ORDER BY 
                                    AgeAtAward ASC, pe.dob ASC
                                LIMIT 1;
                            ");
                            $stmtYoungest->execute();
                            $youngest = $stmtYoungest->fetch(PDO::FETCH_ASSOC);
                        
                            $stmtOldest = $conn->prepare("
                                SELECT 
                                    pe.name AS ActorName, 
                                    mp.name AS MotionPictureName, 
                                    pe.dob AS DateOfBirth,
                                    TIMESTAMPDIFF(YEAR, pe.dob, CONCAT(a.award_year, '-01-01')) AS AgeAtAward
                                FROM 
                                    People pe
                                INNER JOIN 
                                    Role r ON pe.id = r.pid AND r.role_name = 'Actor'
                                INNER JOIN 
                                    Award a ON pe.id = a.pid
                                INNER JOIN 
                                    MotionPicture mp ON a.mpid = mp.id
                                ORDER BY 
                                    AgeAtAward DESC, pe.dob DESC
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
                                    Movie m ON mp.id = m.id
                                JOIN 
                                    Genre g ON mp.id = g.mpid
                                JOIN 
                                    Location l ON mp.id = l.mpid
                                WHERE 
                                    g.genre_name = 'Thriller' AND 
                                    l.city = 'Boston' AND 
                                    mp.id NOT IN (
                                        SELECT DISTINCT mp2.id
                                        FROM MotionPicture mp2
                                        JOIN Location l2 ON mp2.id = l2.mpid
                                        WHERE l2.city <> 'Boston'
                                    )
                                GROUP BY mp.id
                                ORDER BY mp.rating DESC
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
                        else if (isset($_POST['search_movies_by_likes'])) {
                            $likesThreshold = $_POST['likes_threshold'];
                            $ageLimit = $_POST['age_limit'];
                        
                            $stmt = $conn->prepare("
                                SELECT 
                                    mp.name AS MovieName, 
                                    COUNT(l.mpid) AS Likes
                                FROM 
                                    Likes l
                                JOIN 
                                    User u ON l.uemail = u.email
                                JOIN 
                                    MotionPicture mp ON l.mpid = mp.id
                                WHERE 
                                    u.age < :ageLimit
                                GROUP BY 
                                    l.mpid
                                HAVING 
                                    COUNT(l.mpid) > :likesThreshold
                            ");
                        
                            $stmt->bindParam(':ageLimit', $ageLimit, PDO::PARAM_INT);
                            $stmt->bindParam(':likesThreshold', $likesThreshold, PDO::PARAM_INT);
                            $stmt->execute();
                        
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                            if ($result) {
                                echo "<h2>Movies Liked by Younger Users</h2>";
                                echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Movie Name</th><th>Number of Likes</th></tr></thead>";
                                echo "<tbody>";
                                foreach($result as $row) {
                                    echo "<tr><td>".$row["MovieName"]."</td><td>".$row["Likes"]."</td></tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No movies found with the specified criteria.</p>";
                            }
                        }

                        else if (isset($_POST['search_marvel_warner'])) {
                            $stmt = $conn->prepare("
                            SELECT DISTINCT
                                p.name AS actor_name, 
                                mp.name AS motion_picture_name
                            FROM 
                                People p
                            JOIN 
                                Role r ON p.id = r.pid
                            JOIN 
                                MotionPicture mp ON r.mpid = mp.id
                            WHERE 
                                r.role_name = 'Actor'
                                AND mp.production IN ('Marvel', 'Warner Bros')
                                AND p.id IN (
                                    SELECT r1.pid
                                    FROM Role r1
                                    JOIN MotionPicture mp1 ON r1.mpid = mp1.id
                                    WHERE mp1.production = 'Marvel' AND r1.role_name = 'Actor'
                                )
                                AND p.id IN (
                                    SELECT r2.pid
                                    FROM Role r2
                                    JOIN MotionPicture mp2 ON r2.mpid = mp2.id
                                    WHERE mp2.production = 'Warner Bros' AND r2.role_name = 'Actor'
                                );        
                            ");
                            $stmt->execute();
                            
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                            if ($result) {
                                echo "<h2>Actors in Both Marvel and Warner Bros Productions</h2>";
                                echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Actor Name</th><th>Motion Picture Name</th></tr></thead>";
                                echo "<tbody>";
                                foreach($result as $row) {
                                    echo "<tr><td>".$row["actor_name"]."</td><td>".$row["motion_picture_name"]."</td></tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No actors found who played a role in both Marvel and Warner Bros productions.</p>";
                            }
                        }

                        else if (isset($_POST['search_higher_than_comedy_avg'])) {
                            $stmt = $conn->prepare("
                                SELECT 
                                    mp.name AS MovieName, 
                                    mp.rating AS Rating
                                FROM 
                                    MotionPicture mp
                                WHERE 
                                    mp.rating > (
                                        SELECT AVG(mpInner.rating)
                                        FROM MotionPicture mpInner
                                        JOIN Genre g ON mpInner.id = g.mpid
                                        WHERE g.genre_name = 'Comedy'
                                    )
                                ORDER BY 
                                    mp.rating DESC
                            ");
                            $stmt->execute();
                            
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                            if ($result) {
                                echo "<h2>Movies Rated Higher Than Comedy Average</h2>";
                                echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Movie Name</th><th>Rating</th></tr></thead>";
                                echo "<tbody>";
                                foreach($result as $row) {
                                    echo "<tr><td>".$row["MovieName"]."</td><td>".$row["Rating"]."</td></tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No movies found with ratings higher than the comedy genre average.</p>";
                            }
                        }

                        else if (isset($_POST['search_top_movies_by_roles'])) {
                            $stmt = $conn->prepare("
                                SELECT 
                                    mp.name AS MovieName,
                                    COUNT(DISTINCT r.pid) AS PeopleCount,
                                    COUNT(r.role_name) AS RoleCount
                                FROM 
                                    MotionPicture mp
                                JOIN 
                                    Role r ON mp.id = r.mpid
                                GROUP BY 
                                    mp.id
                                ORDER BY 
                                    RoleCount DESC
                                LIMIT 5
                            ");
                            $stmt->execute();
                            
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                            if ($result) {
                                echo "<h2>Top 5 Movies by Role Participation</h2>";
                                echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Movie Name</th><th>People Count</th><th>Role Count</th></tr></thead>";
                                echo "<tbody>";
                                foreach($result as $row) {
                                    echo "<tr><td>".$row["MovieName"]."</td><td>".$row["PeopleCount"]."</td><td>".$row["RoleCount"]."</td></tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No movies found.</p>";
                            }
                        }

                        else if (isset($_POST['search_actors_with_same_birthday'])) {
                            $stmt = $conn->prepare("
                            SELECT 
                                p1.name AS Actor1, 
                                p2.name AS Actor2, 
                                p1.dob AS CommonBirthday
                            FROM 
                                People p1
                            JOIN 
                                People p2 ON p1.dob = p2.dob AND p1.id < p2.id
                            JOIN 
                                Role r1 ON p1.id = r1.pid
                            JOIN 
                                Role r2 ON p2.id = r2.pid
                            WHERE 
                                p1.dob IS NOT NULL
                                AND r1.role_name = 'Actor'
                                AND r2.role_name = 'Actor'
                            GROUP BY 
                                p1.id, p2.id
                            ORDER BY 
                                p1.dob;
                            ");
                            $stmt->execute();
                            
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                            if (!empty($result)) {
                                echo "<h2>Actors with the Same Birthday</h2>";
                                echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Actor 1</th><th>Actor 2</th><th>Common Birthday</th></tr></thead>";
                                echo "<tbody>";
                                foreach($result as $row) {
                                    echo "<tr><td>".$row["Actor1"]."</td><td>".$row["Actor2"]."</td><td>".$row["CommonBirthday"]."</td></tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No actors found with the same birthday.</p>";
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        // JavaScript for handling other actions
    </script>
</body>
</html>
