<div class="container">
    <div class="row">
        <div class="col-lg-12" >
            <div class="row">
                <div class="col-lg-6">
                    <h3>Delete existing task</h3>
                    <hr>
                   
                    <?php if((!empty($alllists)) && (!empty($alltasks))): ?>
                            
                            <form action="/task/delete" method="post">

                                <select class="custom-select" name="task">
                                    <option selected value="0">Select list for task</option>
                                    <?php foreach ($alltasks as $task): ?>
                                        <option value="<?php echo $task['id']; ?>"><?php echo $task['title'];?> - <strong><?php echo $task['date'] ?></strong></option>
                                    <?php endforeach; ?>
                                </select>

                                <button class="btn btn-danger" type="submit">Delete task</button>

                            </form>

                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>
</div>