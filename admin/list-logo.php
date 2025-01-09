<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>All Posts</h3>
                        </div>
                        <div class="bottom view-post">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <table class="table" border="1px">
                                        <tr>
                                            <th>ID</th>
                                            <th>Thumbnail</th>
                                            <th>Pined</th>
                                            <th>Publish Date</th>
                                            <th>Actions</th>
                                        </tr>
                                        <?php 
                                            $logos = ListLogo($_SESSION['user_id']);

                                            foreach( $logos as $logo ) {
                                                $status = "";

                                                if ($logo['pined']==1) {
                                                    $status = 'is pined';
                                                } else {
                                                    $status = 'is not pined';
                                                }
                                                echo '<tr>
                                                        <td>'.$logo['id'].'</td>
                                                        <td>
                                                            <img style="height: 100px; object-fit: contain" src="http://localhost/jongdeng-news/admin/assets/images/'.$logo['thumbnail'].'" >
                                                        </td>
                                                        <td>'. $status .'</td>
                                                        <td>'. $logo['created_at'] .'</td>
                                                        <td width="150px">
                                                            <a href="update-logo.php?id='.$logo['id'].'" class="btn btn-primary">Update</a>
                                                            <button type="button" remove-id="1" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                        ?>
                                    </table>

                                    <!-- Modal -->
                                    <div class="modal fade" id="removeLogo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="postID" name="postID">
                                                        <button type="submit" class="btn btn-danger" name="btn-remove-logo">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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