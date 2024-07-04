
    <h1>Data Input</h1>
    <?php
    $file = 'modularitas/data.txt';
    
    if (file_exists($file)) {
        $content = file_get_contents($file);
        echo nl2br(htmlspecialchars($content));
    } else {
        echo "No data found.";
    }
    ?>
    <br>
    <a href="index.php?target=addProduct">Back to Form</a>

