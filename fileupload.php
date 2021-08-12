<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>

<?php 
$con = mysqli_connect('localhost','root','Swezan0724','cbse_notes');
if(isset($_POST['submit'])) {
    $fileName = $_FILES['file']['name'];
    $path = "Notes/".$fileName;
    $className = $_POST['class'];
    $size = $_FILES['file']['size'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if ($fileActualExt == "pdf") {
        if($fileError===0) {
            if ($size < 100000000) {
                $query = "insert into file_info_${className}(name, size, downloads) values('$fileName', $size, 0)";
                $result = mysqli_query($con, $query);
                if($result) {
                    move_uploaded_file($fileTmpName, $path);
                    header('Location: index.html?uploadsuccess');
                } else {
                    echo mysqli_error($con);
                }
            } else {
                echo "Your file is too big";
            }
        } else {
            echo "There was an error uploading your file";
        }
    } else {
        echo "You cannot upload files of this type";
    }
    
}
?>

<body>
    <table border="1px" align="center">
        <tr>
            <td>
                <form action="fileupload.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file" required="required">
                    Class: <select name="class" required="required">
                        <option value="">None</option>
                        <option value="sixth">Sixth</option>
                        <option value="seventh">Seventh</option>
                        <option value="eighth">Eighth</option>
                        <option value="nineth">Nineth</option>
                        <option value="tenth">Tenth</option>
                        <option value="eleventh">Eleventh</option>
                        <option value="twelvth">Twelvth</option>
                    </select>
                    <button type="submit" name="submit">Upload</button>
                </form>  
            </td>
        </tr>
    </table>
</body>
</html>