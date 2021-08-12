<?php
include_once('connection.php');
$connection=mysqli_connect('localhost','root','Swezan0724','cbse_notes');
$class_name = $_GET['class'];
$query="select * from file_info_${class_name}";
$result=mysqli_query($connection ,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>


</head>
<body>

<div id="body1">

<div id="manual-header">
    <img src="image/limage.jpeg" id="logo">
    <h2 class="main-heading">Sahil Mathematics</h2>
</div>
<div class="menu">

<style>

:root {
    --mainColor: grey;
}

a {
    background:
    linear-gradient(
        to right,
        var(--mainColor) 0%,
        var(--mainColor) 5px,
        transparent 5px
    );
    background-repeat: repeat-x;
    background-size: 100%;
    color: #000;
    padding-left: 10px;
    text-decoration: none;
}

a:hover {
    background:
    linear-gradient(
        to right,
        var(--mainColor) 0%,
        var(--mainColor) 5px,
        transparent
    );
}

</style>

    <div class="top"><a type="submit" href="index.html" style="color: white;" class="mainhead">Home</a></div>
    <div class="top"><a type="submit" href="index.html" style="color: white;" class="mainhead">About</a></div>
    <div class="top"><a type="submit" href="index.html" style="color: white;" class="mainhead">Contact Us</a></div>
</div>
</div>


    <div class="container">
        <div class="manual-header">
            <h2 id="title">Sahil Mathematics</h2>
        </div>
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    Download Free Notes by Sahil Sir 
                </div>
                <div class="card-body">
                    <h5 class="card-title" id="table_title">Topicwise notes for class</h5>

                    <form action="topics.php" method="GET">

                    <table id="MyTable" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topic Name</th>
                            <th scope="col">Size</th>
                            <th scope="col">No of Downloads</th>
                            <th scope="col" >
                                <div class="column-action">
                                    Action
                                </div>
                            </th>
                            </tr>
                        </thead>
                        <tbody name="MyTable" id="tbody">

                            <?php
                                while($rows=mysqli_fetch_assoc($result)){
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $rows['id']; ?></th>
                                        <td name="MyTable"><?php echo $rows['name']; ?></td>
                                        <td><?php echo $rows['size']; ?></td>
                                        <td><?php echo $rows['downloads']; ?></td>
                                        <td>
                                            <a type="submit" class="float-end" href="filedownload.php?class=<?php echo $class_name ?>&topic_id=<?php echo $rows['id']; ?>" >Download</a>
                                            <a target="blank" type="submit" class="float-end me-2" href="fileview.php?class=<?php echo $class_name ?>&topic_id=<?php echo $rows['id']; ?>">View</a>
                                        </td>
                                    </tr>
                            <?php 
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
            let title = document.querySelector('#title');
            let table_title = document.querySelector('#table_title');
            var b=localStorage.getItem("myValue");
            
            title.innerHTML = "Class "+b+" Notes";
            table_title.innerHTML = "Topic wise notes for class "+b;

        </script>
    </body>

</html>