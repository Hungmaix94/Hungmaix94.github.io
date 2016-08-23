
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
            <?php foreach ($data as $row):?>
            <div class="post-preview">
                <a href="<?php echo BASE_PATH;?>/post/<?php echo $row['id'] ;?>">
                    <h2 class="post-title">
                        <?php echo $row['title'];?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?php echo substr($row['content'],0,70);?>
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#"><?php echo $row['user_name']?></a> on <?php echo $row['created_time'];?></p>
            </div>
            <hr>
            <?php endforeach;?>

            <!-- Pager -->

            <ul class="pager">
                <?php if ($current_page > 1) :?>
                    <li class="prev">
                        <a style="float: left" href="<?php echo BASE_PATH;?>/post?page=<?php echo($current_page - 1) ?>">&#x2190;  Newwer Posts </a>
                    </li>
                <?php endif; ?>

                <?php for($i=1;$i<=$total_page;$i++):;?>
                    <li class="pagination <?php if($i==$_GET['page']):echo " ";?><?php endif;?>">
                        <a href="<?php echo BASE_PATH;?>/post?page=<?php echo $i;?>"><?php echo $i;?></a>
                    </li>
                 
                <?php endfor;  ?>

                <?php if ($current_page < $total_page) : ?>
                    <li class="next">
                        <a href="<?php echo BASE_PATH;?>/post?page=<?php echo($current_page + 1) ?>">Older Posts →</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
        <script>

        </script>

    </div>
</div>

<hr>

