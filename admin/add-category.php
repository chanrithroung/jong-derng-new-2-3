<?php 
    include('sidebar.php');

    
    
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Category</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <p class="message"> 
                                        <?php
                                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                                createCategory($_POST, $_SESSION['user_id']);
                                            }
                                        ?>
                                    </p>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" name="category" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create category</button>
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