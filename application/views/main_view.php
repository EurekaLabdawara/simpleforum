<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to Simple Fourm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <style type="text/css">

    </style>
</head>

<body>

    <div id="container">
        <center>
            <h1>Welcome to Simple Forum!</h1>
            <div id="body">
                <div class="card col-sm-10 m-2">
                    <div class="card-body">
                        <form action="<?php echo base_url(); ?>simpleforum/createpost" method='post'>
                            <div class="form-group" style="text-align:left">
                                <label for="authorname">Author's Name</label>
                                <input type="text" name="author" class="form-control" id="authorname"
                                    placeholder="Enter Your Name">
                            </div>
                            <div class="form-group" style="text-align:left">
                                <label for="desc">Put The Post's Description</label>
                                <input type="textarea" name="deskripsi" class="form-control" id="desc"
                                    placeholder="Write down what you want to post">
                            </div>
                            <div class="row col-sm-2 " style="float:right">
                                <button type="submit" class="btn btn-primary">Create New
                                    Post</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php

                if ($posts != NULL) {
                    foreach ($posts as $post) {
                        ?>
                <div class="card col-sm-10 m-2 editpostcard">
                    <div class="card-body">
                        <form action="<?php echo base_url(); ?>simpleforum/updatepost" method='post'>
                            <div class="form-group" style="text-align:left">
                                <input type="text" name="id" value="<?php echo $post->idPost ?>" hidden>
                                <label for="authorname">Update Author's Name</label>
                                <input type="text" name="author" class="form-control" id="authorname"
                                    value="<?php echo $post->author ?>">
                            </div>
                            <div class="form-group" style="text-align:left">
                                <label for="desc">Update The Post's Description</label>
                                <input type="textarea" name="deskripsi" class="form-control" id="desc"
                                    value="<?php echo $post->deskripsi ?>">
                            </div>
                            <div class="row" style="float:right">
                                <button type="submit" class="btn btn-warning" style=" margin:5px;">Save Update</button>
                                <a class="btn btn-success update" style=" margin:5px;color:white;">Cancel
                                    Update</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card col-sm-10 m-2 postcard">
                    <div class="card-body">
                        <div style="text-align:left">
                            <h5 class="card-title"><?php echo $post->author; ?></h5>
                            <p class="card-text"><?php echo $post->deskripsi; ?></p>
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-warning update" style="margin:5px">Update</a>
                            <a href="<?php echo base_url(); ?>simpleforum/deletepost?id=<?php echo $post->idPost; ?>"
                                class="btn btn-danger" style="margin:5px">Delete</a>
                        </div>
                    </div>
                </div>
                <?php
                }
            } else {
                ?>
                <div class="card col-sm-10 m-2">
                    <div class="card-body">
                        <div style="text-align:center">
                            <h5 class="card-title">There are No Post!</h5>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
        </center>
    </div>
</body>
<script>
$('.editpostcard').hide();
$(document).ready(function() {
    $('.editpostcard').each(function(index, value) {
        // console.log('div edit ' + index + ':' + $(this).attr('id'));
        $(this).find('.update').click(function() {
            $('.editpostcard').eq(index)
                .toggle();
            $('.postcard').eq(index)
                .toggle();
        });
    });

    $('.postcard').each(function(index, value) {
        // console.log('div post ' + index + ':' + $(this).attr('id'));
        $(this).find('.update').click(function() {
            $('.postcard').eq(index)
                .toggle();
            $('.editpostcard').eq(index)
                .toggle();
        });
    });
});
</script>

</html>