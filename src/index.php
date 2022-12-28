


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ludvig Flyckt">
    <link rel="stylesheet" href="/styling/style.css">
    <link rel="icon" href="../assets/images/TM-logo.png" type="iamge/x-icon">
    <title>Task Manager</title>
</head>

<body>
    <header><img src="../assets/images/TM-logo.png" alt="TM logo"></header>
    <section id="new-task"><form method="POST" action="index.php">
        <label class="heading" for="title">Title</label>
        <input id="title" class="task-text" type="text" name="title" placeholder="Title"/>
        <label class="heading" for="content">Add task</label>
        <input id="content" class="task-text" type="text" name="title" placeholder="New task.."/>
        <label id="ad-picture" for="img">+ Add image<input type="file" id="img" name="img" accept="image/*"></label>
        <img id="preview>
  
    </form>
</section>
<div id="buttons">
<button id="add-task-btn" type="submit">+ Add task</button>
</div>
    <footer>
        <div id="links">
        <a href="#">
        <img src="../assets/images/gg_list.png" alt="List">
        </a>
        <a href="#"><img src="../assets/images/mdi_settings-outline.png" alt="Settings"></a>
        <a href="#"><img src="../assets/images/mdi_user.png" alt="Profile"></a>
        <a href="#"><img src="../assets/images/ph_trash-bold.png" alt="Deleted"></a></div>
    
        <button type="button">+</button>
        
    </footer>
</body>

</html>