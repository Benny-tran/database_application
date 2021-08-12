<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Using PHP</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>

</head>
<body>
    <?php if (isset($_GET['error'])): ?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif; ?>    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input class="form-control" type="text" name="productName" placeholder="Product Name">
        <input class="form-control" type="text" name="description" placeholder="Description">
        <input class="form-control" type="text" name="startingPrice" placeholder="Starting Price">
        <input type="file" name="my_image">
        <input class="form-control" type="datetime-local" name="closeTime">
        <button type="submit" class="btn btn-primary" name="submit">Upload</button>
    </form>
</body>
</html>