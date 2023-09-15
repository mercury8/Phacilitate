<?php if( have_rows('feedbacks') ): ?>
    <div class="carousel_bg">
        <div class="container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $active = 'active';
                    $num = 0;
                    while ( have_rows('feedbacks') ) : the_row();
                        ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $num ?>" class="<?php echo $active ?>"></li>
                        <?php
                        $active = '';
                        $num += 1;
                    endwhile; ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    $active = 'active';
                    while ( have_rows('feedbacks') ) : the_row();
                        ?>
                        <div class="item <?php echo $active ?> screen08">
                            <div class="container">
                                <h1><?php the_sub_field('content'); ?></h1>
                            </div>
                        </div><!-- /item -->
                        <?php $active = '';
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div><!-- /row -->
<?php endif; ?>