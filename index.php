<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>Beta Sigma Psi - Select Option</title>
        <link rel="stylesheet" type="text/css" href="Styles/landing.css">
	</head>
	<body>
    <?php
        require 'initDB.php';
        //add this to delete the db
        // require 'deinitDB.php';
    ?>
        <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <div class="wrapper">
            <button type="button" class="buttons" onclick="window.location.href='roster.php'">Roster</button>
        </div>
        <div class="wrapper">
            <button type="button" class="buttons" onclick="window.location.href='rooms.php'">Rooms</button>
        </div>     
        <div class="wrapper">
            <button type="button" onclick="window.location.href='member.php'" class="buttons">Member Example</button>
            <!--<button onclick="myFunction()" class="buttons">Search for Member</button>
            <div id="myDropdown" class="wrapper dropdown-content">
                <input type="text" placeholder="Search for Member" id="myInput" onkeyup="filterFunction()">
                    <a href="#about">About</a>
                    <a href="#base">Base</a>
                    <a href="#blog">Blog</a>
                    <a href="#contact">Contact</a>
                    <a href="#custom">Custom</a>
                    <a href="#support">Support</a>
                    <a href="#tools">Tools</a>
            </div>-->
        </div>
        <div class="wrapper">
            <form action="member.php">
                <input id="searchButton" onclick="filterFunction()" type="text" placeholder="Search..." name="searchQuery">
                <button type="submit">Submit</button>
            </form>
        </div>
	</body>
    <script>
        function filterFunction() {
                var input, filter, ul, li, a, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                div = document.getElementById("myDropdown");
                a = div.getElementsByTagName("a");
                for (i = 0; i < a.length; i++) {
                    if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                    } else {
                        a[i].style.display = "none";
                    }
                }
            }
        </script>
</html>
