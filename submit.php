<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHENEELALANINE</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <?php include("navbar.html");
          $eels= ['Anguilla anguilla', 'Anguilla japonica', 'Anguilla rostrata', 'Anguilla australis', 'Anguilla dieffenbachii', 'Anguilla marmorata', 'Anguilla mossambica', 'Anguilla megastoma', 'Anguilla bicolor', 'Anguilla celebesensis', 'Anguilla interioris', 'Anguilla obscura', 'Anguilla reinhardtii', 'Anguilla nebulosa', 'Anguilla borneensis', 'Anguilla bengalensis', 'Anguilla luzonensis']
    ?>
    <h1>Submit sequences</h1>
    <div id="content">
        <h3>Input your data</h3>
     <form action="process.php" method="POST" enctype="multipart/form-data">
        <label>Upload a FASTA file</label>
        <input type="file" name="upload_file"><br><br>
        <label>Pick an eel to highlight:</label>
        <select name="eel">
       <?php foreach($eels as $eel){
              echo "<option value=\"$eel\">$eel</option>";
            }
        ?>
        </select><br><br>
        <h3>Set parameters</h3>
        <input type="checkbox" name="checkbox">Color phenylalanine<br><br>
        <label>Enter amino acids per line</label>
        <input type="number" name="number"><br><br>
        <input type="submit" name="submit"><br><br>

    </form>
</body>
</html>