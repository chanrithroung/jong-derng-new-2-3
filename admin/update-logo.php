<?php 
    include('sidebar.php');


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        updateLogo($_POST, $_FILES['thumbnail']);
        header("Location: list-logo.php");
    }
    
    $logo = getCurrentData($_GET['id'], 'website_logo');
    $isCheck = "";
    if ($logo['pined'] == '1')  $isCheck = 'checked';
    
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Update Logo</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="logoId" value=" <?php echo $logo['id'] ?>">
                                    <input type="hidden" name="oldThumbnail" value="<?php echo $logo['thumbnail'] ?>">
                                    <div class="form-group">
                                        <label>Pined</label>
                                        <input type="checkbox" name="pined" <?php echo $isCheck ?> value="1" class="form-check-input">
                                    </div>

                                    <div class="form-group">
                                        <label>Thumbnail</label> <br>
                                        <img src="http://localhost/jongdeng-news/admin/assets/images/<?php  echo $logo['thumbnail'] ?>" class="img-update">
                                        <input type="file" name="thumbnail" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="btn-update-logo">Save</button>
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