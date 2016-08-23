
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url(<?php echo BASE_PATH ?>/public/img/home-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><?php echo $title;?></h1>
                    <hr class="small">
                    <span class="subheading"><?php echo $description;?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
             <textarea id="editor1" name="editor1" cols="80" rows="10">
           <p>Hello <strong>CKEditor</strong></p>
       </textarea>

            <!-- (3): Code Javascript thay thế textarea có id='editor1' bởi CKEditor -->
            <script>

                CKEDITOR.replace( 'editor1' );

            </script>

            </form>
        </div>
    </div>
</div>

<hr>

