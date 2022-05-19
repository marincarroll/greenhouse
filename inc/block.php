<?php
/**
 * Register block server-side with a render_callback
 */
add_action( 'init', 'mcgjb_register_blocks' );
function mcgjb_register_blocks() {
    $dir     = MCJB_PATH . 'src';
	$options = [ 'render_callback' => 'mcgjb_render_block' ];

	register_block_type( $dir, $options );
}

function mcgjb_render_block() {
    $data = mcgjb_fetch_greenhouse_jobs();
    ob_start();
?>
    <section class="greenhouse">
        <?php foreach( $data as $department => $jobs ) : ?>
            <div class="greenhouse__dept">
                <h2 class="greenhouse__dept-title"><?= $department ?></h2>
                <?php foreach( $jobs as $job ) : ?>
                    <div class="greenhouse__job">
                        <a class="greenhouse__job-link" href="<?= $job->absolute_url ?>" target="_blank">
                            <h3 class="greenhouse__job-title"><?= $job->title ?></h3>
                            <span class="greenhouse__job-location"><?= $job->location->name ?></span>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </section>
<?php
    return ob_get_clean();
}