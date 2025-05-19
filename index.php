<?php
// Define variables to store form data
$textField = "";
$imagePath = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle text field input
    $textField = htmlspecialchars($_POST['textField']);
    
    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Define allowed image types
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = $_FILES['image']['type'];

        // Check if the uploaded file is of an allowed type
        if (in_array($fileType, $allowedTypes)) {
            $uploadDir = "uploads/";
            $fileName = basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $fileName;

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $imagePath = $uploadFile;
                echo "Image uploaded successfully!<br>";
            } else {
                echo "Error uploading image.<br>";
            }
        } else {
            echo "Invalid image type. Only JPEG, PNG, and GIF are allowed.<br>";
        }
    } else {
        echo "No image uploaded or error occurred.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text and Image Upload</title>
</head>
<body>
    <h2>Leaf Colour - Task (Screenshot) Upload Form</h2>
	<br>	


    <!-- Form for text field and image upload -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="textField">Task Date:</label>
        <input type="text" id="textField" name="textField" value="<?php echo $textField; ?>" required>
        <br><br>
		<label for="textField">Your Name:</label>
        <input type="text" id="textField" name="textField" value="<?php echo $textField; ?>" required>
        <br><br><label for="textField">Your ID no:</label>
        <input type="text" id="textField" name="textField" value="<?php echo $textField; ?>" required>
        <br><br><label for="textField">No of tasks:</label>
        <input type="text" id="textField" name="textField" value="<?php echo $textField; ?>">
        <br><br><label for="textField">Enter Text:</label>
        <input type="text" id="textField" name="textField" value="<?php echo $textField; ?>">
        <br><br>
		
		<hr>
		<h2>Upload images</h2>
        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <br><br>
		<label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <br><br>
		<label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <br><br>
		<label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <br><br>
		<label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <br><br>
		<label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <br><br>
		<label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <br><br>
		<label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <br><br>
		
		<hr>

        <h1><input type="submit" value="Submit"></h1>
    </form>

    <?php
    // If there's an uploaded image, display it
    if ($imagePath) {
        echo "<h3>Uploaded Image:</h3>";
        echo "<img src='$imagePath' alt='Uploaded Image' style='max-width: 300px;'><br>";
    }

    // Display the entered text
    if ($textField) {
        echo "<h3>Entered Text:</h3>";
        echo "<p>$textField</p>";
    }
    ?>
</body>
</html>
