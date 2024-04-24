<?php
    require_once 'class/session_oop.php';
    require_once 'action/session_act.php';
    require_once 'includes/head.php';
    require_once 'class/manage_post_oop.php';
    require_once 'action/manage_post_act.php';
    
?>
<body>

    <?php require_once('includes/header.php') ?>

    <main>
        
        <?php if(isset($_GET['edit_id'])): ?>
            
        <section class="container-edit">
            
                
            <h1>Upraviť príspevok</h1>

            <form action="" method="post">
                <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="edit_id" value="<?php echo $_GET['edit_id']; ?>">
                    <div class="mb-3">
                        <label for="post_title">Title</label><br>
                        <input type="text" name="post_title" value="<?php echo $data_post[0]["title"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="Obsah">Content</label><br>
                        <textarea name="content" id="content" cols="80" rows="10"><?php echo $data_post[0]["content"];?></textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                <div class="mb-3">
                    <input type="submit" name="edit" value="Edit"> 
                </div>
                <div class="mb-3">
                    <a href='manage_post.php?delete_id=<?php echo $row['edit_id']; ?>'>Delete</a></td>
                </div>  
                <div class="mb-3">
                <select name="category" id="category">
                    <option value="">Vyberte kategóriu</option>
                    
                    <?php foreach ($categories as $category): ?>
                        
                        <option value="<?php echo $category["category_id"]  ?>" selected><?php echo $category["name"] ?></option> 
                    <?php endforeach; ?>
                        
                    
                </select>
                </div>  
                </div>
                </div>
            </form>
                
            
              
            
        </section>
        <?php elseif (isset($_GET['create-post'])): ?>  
            
        <section class="container-create">
        <form action="" method="post">
                    
                    <div class="mb-3">
                        <label for="post_title">Title</label><br>
                        <input type="text" name="post_title">
                    </div>
                    <div class="mb-3">
                        <label for="Obsah">Content</label><br>
                        <textarea name="content" id="content" cols="80" rows="10"></textarea></textarea>
                    </div>
                    <input type="submit" name="create" value="create">
                    
                </form>
        </section> 
        <?php else: ?>  
        
        <a href="manage_post.php?create-post">Create Post</a>
        <section class="container-manage-post">
            <table >
            <h1>Spravovať príspevky</h1>
            <tr><th>Title</th><th>Content</th><th>Created At</th><th>Last Update</th><th>Edit / Delete</th></tr>
            
            <?php foreach ($posts as $row): ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><?php echo $row['last_update']; ?></td>
                    <td><a href='manage_post.php?edit_id=<?php echo $row['post_id']; ?>'>Edit</a>/<a href='manage_post.php?delete_id=<?php echo $row['post_id']; ?>'>Delete</a></td>
                    
                </tr>
            <?php endforeach; ?>
            </table>
        </section>
        <?php endif; ?>
    </main>
    <?php include('includes/footer.php') ?>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
    selector: '#content'
    });
    </script>
</body>
</html>