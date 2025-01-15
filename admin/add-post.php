<?php 
    include('sidebar.php');
    $categories  = listCategory( $_SESSION['user_id'] );
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Sport News</h3>
                        </div>
                        <div class="bottom">
                            <p class="message">
                                <?php 
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        addNews($_POST, $_FILES['thumbnail'], $_SESSION['user_id']);
                                    }
                                ?>
                            </p>
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="title" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select name="category_id" class="form-select">
                                            <?php
                                                foreach($categories as $category) {
                                                    echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pined</label>
                                        <input name="pined" type="checkbox" class="form-check-input">
                                    </div>
                                
                                    <div class="form-group">
                                        <label>File</label>
                                        <input name="thumbnail" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save news</button>
                                    </div>
                                </form>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>