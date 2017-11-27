
<div class="container">
    <div class="row">
        <div class="col-lg-12"  >
            <div class="row">
                <div class="col-lg-6">
                    <h3>All Lists</h3>
                    <hr>

                        <?php foreach ($alllists as $list): ?>
                            <h6 ><?php echo $list['date']; ?><span><a href="/tasks/export/<?php echo $list['id']; ?>" style="float:right;text-decoration: none;">Export</a></span></h6>

                            <?php foreach ($tasks as $task): ?>
                                <?php if($task['list_id'] == $list['id']): ?>
                                    <?php echo $task['title']; ?><br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <br>
                        <?php endforeach; ?>

                </div>

            </div>
        </div>

    </div>
</div> 