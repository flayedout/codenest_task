<div class="container">
    <div class="row">



        <?php if(!empty($alllists)): ?>
        <div class="col-lg-6" >
            <h3>Delete a list</h3>
            <hr>
            <form action="/lists/delete" method="post">


                <select class="custom-select"
                        name="list" <?php echo(empty($none_requested_lists) ? 'disabled' : ''); ?> >
                    <?php foreach ($none_requested_lists as $list): ?>
                        <option value="<?php echo $list['id']; ?>"><?php echo $list['date']; ?></option>
                    <?php endforeach; ?>
                    <?php if (empty($none_requested_lists)): ?>
                        <option value="">No lists available</option>
                    <?php endif; ?>
                </select>

                <?php if((!empty($none_requested_lists))): ?>
                <button class="btn btn-primary" type="submit">Send</button>
                <?php endif; ?>
            </form>
        </div>
            <?php else: ?>
            <div class="col-lg-6">
                <h3>My lists</h3>
                <p>There are currently no lists</p>
            </div>
        <?php endif; ?>
        <div class="col-lg-6" >
            <h3>Requested lists</h3>
            <?php if(!empty($pendingdeletes)): ?>
                <?php foreach ($pendingdeletes as $delete): ?>
                    <h6><?php echo $delete['date']; ?></h6>
                <?php endforeach; ?>
            <?php else: ?>
            
            <?php endif; ?>
        </div>


    </div>


</div>