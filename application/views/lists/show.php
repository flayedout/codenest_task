<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <hr>
            <p>Current list <?php echo $listName; ?></p>
            <hr>
            <?php if (isset($lists) && count($lists) > 0): ?>
                <?php foreach ($lists as $list): ?>
<!--                    --><?php //var_dump($list) ?>
                    <ul class="card" style="color:white;background-color: cornflowerblue; ">
                        <li><?php echo $list['title']; ?></li>
                        <li><?php echo $list['description']; ?></li>
                        <li><?php echo $list['created_at']; ?></li>
                    </ul>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No records found</p>
            <?php endif; ?>

        </div>
    </div>
</div>