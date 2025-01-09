<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Logo</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <p class="message"> 
                                            <?php
                                                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                                    AddLogo(REQEUST:$_POST, SOURCE_FILE: $_FILES['thumbnail'], author_id: $_SESSION['user_id'] ); 
                                                }
                                            ?> 
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label>Pined</label>
                                        <input type="checkbox" name="pined" value="1" class="form-check-input">
                                    </div>
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <input type="file" name="thumbnail" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="btn-insert-logo">Submit</button>
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