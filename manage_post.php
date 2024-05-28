<?php
require_once 'class/session_oop.php';
require_once 'includes/head.php';
require_once 'class/crud_post_opp.php';
require_once 'class/stat_oop.php';
require_once 'action/manage_post_act.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<body>
    <?php require_once('includes/header.php') ?>

    <main>
        <div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPostModalLabel">Upraviť článok</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="hidden" name="edit_id">
                                <label for="post_title" class="form-label">Názov</label>
                                <input type="text" class="form-control" name="post_title" >
                            </div>
                            <div class="mb-3">
                                <label for="Content" class="form-label">Obsah</label>
                                <textarea class="form-control" name="content" id="content"></textarea>
                            </div>
                            <div class="mb-3">
                                
                                <label for="Category" class="form-label">Kategórie</label>
                                <select class="form-select" name="category" id="category">
                                    <option value='0' selected>Vyberte kategóriu</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category["category_id"]  ?>" ><?php echo $category["name"] ?></option> 
                                    <?php endforeach; ?>
                                </select> 
                                <input class="form-control" type="file" name="title_img">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="return confirm('Ste si istý, že chcete zahodiť vaše zmeny?')">Zatvoriť</button>
                            <button type="submit" class="btn btn-primary" name="edit" value="Upraviť" onclick="return confirm('Chcete upraviť svoje zmeny?')">Uložiť zmeny</button>
                                </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
           
                
              
    

    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPostModalLabel">Vytvoriť článok</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="post_title" class="form-label">Názov</label>
                            <input type="text" name="post_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Obsah</label>
                            <textarea name="create-content" id="content" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategórie</label>
                            <select name="category" id="category" class="form-select">
                                <option value="0" selected>Vyberte kategóriu</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category["category_id"]  ?>"><?php echo $category["name"] ?></option> 
                                <?php endforeach; ?>
                            </select> 
                            <input type="file" name="title_img" class="form-control mt-3">
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="return confirm('Ste si istý, že chcete zahodiť vaše zmeny?')">Zatvoriť</button>
                                <button type="submit" class="btn btn-primary" name="create" value="Upraviť">Vytvoriť</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
         
            
            <section class="container-manage-post">
                <div style="table-head">
                    <h1>Spravovať príspevky</h1>
                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#createPostModal">Vytvoriť článok</button>
                </div>
                <table>
                    <tr><th>Názov</th><th>Text</th><th>Vytvorené</th><th>Posledná úprava</th><th>Počet zobrazení</th><th>Upraviť / Vymazať</th></tr>
                    
                    <?php foreach ($posts as $row): ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo substr($row['content'], 0, 255)."..."; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td><?php echo $row['last_update']; ?></td>
                            <td><?php echo $row['views']; ?></td>
                            <td>
                                <a href='#' class='edit-link' data-id='<?php echo $row['post_id']; ?>' data-row='<?php echo htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>'>Upraviť</a>
                                /<a href='manage_post.php?delete_id=<?php echo $row['post_id']; ?>'>Vymazať</a>
                            </td>
                        </tr>
                    
                    <?php endforeach; ?>
                </table>
            </section>
       
            
        </main>
        <?php include('includes/footer.php') ?>
        <script scriptttps://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <script>
        CKEDITOR.replace('create-content', {
            width: '100%',
            height: 'auto'
        });
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src=script://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        scriptt src="js/edit-post.js"></script>
        
</body>
</html>