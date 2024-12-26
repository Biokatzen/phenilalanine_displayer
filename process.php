<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHENEELALANINE</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <?php 
     include("navbar.html"); 
    ?>
    <h1>Visualize sequences</h1>
    <?php
      if(isset($_POST['submit'])){
         if(empty($_FILES['upload_file']['tmp_name'])){
             echo "<a id=\"salmon_button\" href=\"submit.php\"><strong>Shocking news, you forgot to upload your file!</strong></a>";
             echo "<img id='fish' src='EelvisPresley2.png'>";
            }else{
                $lines = file_get_contents($_FILES['upload_file']['tmp_name']);
            }
        }else{
             echo "<a id=\"salmon_button\" href=\"submit.php\"><strong>Shocking news, you forgot to submit your data!</strong></a>";

        } 
        $lines = explode("\n", $lines);
        $sequences = [];
        foreach($lines as $line){
            $line = trim($line);
            if(preg_match("/^>/", $line)){
                $header = $line;
            }else{
                $sequences[$header] = $line;
            }
        }
        
        foreach($sequences as $header => $sequence){
            $parts = explode("|", $header); 
            $species = str_replace("_", " ", ltrim($parts[0], ">"));
                if(strpos($_POST['eel'], $species) !== false){
                    echo "<div id='content' style='overflow:auto; border: solid #008080 2px';>";
                    echo "<h3>$species</h3>";
                    $nucleotides = str_split($sequence);
                    foreach($nucleotides as $index => $nucleotide){
                         if($index % $_POST['number'] == 0 and $index != 0){
                             echo "<br>";
                            }
                         if(!empty($_POST['checkbox'])){
                             if($nucleotide == "F"){
                                 echo "<span style='font-family: monospace; background: #008080; color: white;'>$nucleotide</span>"; 
                                }
                            }
                         echo "<span style='font-family: monospace;'>$nucleotide</span>";

                        }  
                    echo "</div>";
                }else{
                 echo "<div id='content' style='overflow:auto';>";
                    echo "<h3>$species</h3>";
                    $nucleotides = str_split($sequence);
                    foreach($nucleotides as $index => $nucleotide){
                            echo "<span style='font-family: monospace;'>$nucleotide</span>";

                        }
                 echo "</div>";

                }
                    
      
                
        }
       
        
      
    ?>
</body>
</html>