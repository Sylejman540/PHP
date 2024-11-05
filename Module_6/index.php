<?php
    // 'w' - Opens a file for write-only mode. If a file does not exist then a new file is created and if the file already exists then the line of the contents of the file are erased for write-only mode.
    // 'r' - File is opened for read-only mode.
    // 'a' - File is opened for write-only mode. The file pointer points to the end of the file. Existing data in the file is preserved.
    // 'w+' - Opens the file for read and write mode. If a file does not exist then a new file is created and if the file already exists the contents of the file are erased.
    // 'a+' - This is opened for write/read mode.
    // 'x' - Newly file is created for write-only mode.

    $file = fopen("example.txt", "w"); // Open or create 'example.txt' for writing
    if ($file) {
        // Step 2: Write data to the file
        $content = "Hello, this is a line of text written to the file.\n";
        fwrite($file, $content);
    
        $moreContent = "Here's another line of text.\n";
        fwrite($file, $moreContent);
    
        // Step 3: Close the file after writing
        fclose($file);
        echo "Data written to file successfully.\n";
    } else {
        echo "Failed to open the file for writing.\n";
    }
    
    // Step 4: Open the file for reading
    $file = fopen("example.txt", "r");
    if ($file) {
        // Step 5: Read the file content until the end
        while (!feof($file)) {
            $line = fread($file, 8192); // Read up to 8192 bytes at a time
            echo $line;
        }
    
        // Step 6: Close the file after reading
        fclose($file);
    } else {
        echo "Failed to open the file for reading.\n";
    }
    
    // Step 7: Use file_put_contents for simpler writing
    $newContent = "This content is written using file_put_contents.\n";
    file_put_contents("example.txt", $newContent, FILE_APPEND); // Append new content
    
    echo "Additional content written using file_put_contents.\n";

echo "Script is running";

     /// Function to write a message to a file
function writeToFile($message) {
  // Open the file in append mode
     $file = fopen("example.text", "a");
    
     // Check if the file was successfully opened
     if ($file) {
         // Write the message to the file
         fwrite($file, $message . PHP_EOL);

        // Close the file
         fclose($file);
    } else {
       // Display an error if the file could not be opened
     echo "Could not open the file!";   
    }
 }




//2. Read from a file using 'fopen', 'fread', 'feof', 'fclose'

function readFromFile(){
    $file = fopen("example.txt", 'r');

    //Check if the file was opened succesfully
    if($file){
        echo "Content of example.txt";

        //Read the file until the end (eof)
        while(!feof($file)){
            $line = fgets($file);
            echo htmlspecialchars(($line)."<br>");
        }
        fclose($file);
    } else{
        echo "Failed to open the file for reading!!";
    }
    
}

// 3.Write a single line to the file using file_put_contents
function quickWriteToTheFile($message){
    file_put_contents("example.txt", $message."PHP_EQL");
    echo "Message written to the file using file_put_contect!<br>";
}


writeToFile("This is a sample log message!!");
quickWriteToTheFile("This will overwrite everything with a new message!!");
readFromFile();

        

    ?>
