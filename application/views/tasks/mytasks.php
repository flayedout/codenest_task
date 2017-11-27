<?php //echo '<pre>'; ?>
<?php //foreach ($alltasks as $task): ?>
<!--    <p>--><?php //echo $task['date']; ?><!--</p>-->
<?php //endforeach; ?>
<?php //die; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12"  >
            <div class="row">
                <div class="col-lg-6">
                    <h3>All Tasks</h3>
                    <hr>
                    <?php if (isset($alltasks) && count($alltasks) > 0): ?>
                        <?php foreach ($alltasks as $task): ?>
                            <h6 >

                                <input data-id="<?php echo $task['id']; ?>" class="big-checkbox toggle-status" type="checkbox" <?php echo ( $task['status'] == 1) ? 'checked' : ''; ?>>
                                <span  ><?php echo $task['title']; ?></span>
                            </h6>
                            <br>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h6>There are no tasks currently</h6>
                    <?php endif; ?>

                </div>

                <hr>
            </div>
        </div>

    </div>
</div>