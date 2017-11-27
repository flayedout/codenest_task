<div class="container">
    <div class="row">
        <div class="col-lg-12" >
            <div class="row">
                <div class="col-lg-6">
                    <h3>Delete existing list</h3>
                    <hr>

                    <?php if((!empty($notpendinglists))): ?>

                        <form action="/lists/delete" method="post">

                            <select class="custom-select" name="list">
                                <option selected value="0">Select list</option>
                                <?php foreach ($notpendinglists as $list): ?>
                                    <option value="<?php echo $list['id']; ?>"><?php echo $list['date'];?></option>
                                <?php endforeach; ?>
                            </select>

                            <button class="btn btn-danger" type="submit">Request </button>

                        </form>
                    <?php else: ?>
                        <h6>No lists available</h6>
                    <?php endif; ?>
                
                </div>
                <div class="col-lg-6">

                    <h3>Current requests
                    </h3>
                    <hr>
                    <?php if(count($pendinglists) > 0): ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>List</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pendinglists as $pending): ?>
                            <tr>
                                <td><?php echo $pending['date']; ?></td>
                                <td><?php echo $pending['delete_status']; ?></td>
                                <td><a href="#" class="cancel-submittion" data-id="<?php echo $pending['id']; ?>">Cancel</a></td>
                            </tr>
                        <?php endforeach; ?>




                        </tr>

                        </tbody>
                    </table>
                    <?php else: ?>
                        <h6>There are no current requests</h6>
                    <?php endif; ?>

                </div>
                <div class="col-lg-6">
                    <hr>
                    <h3>Accepted requests
                    </h3>
                    <hr>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>List</th>
                            <th>Status</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($acceptedlists as $pending): ?>
                            <tr>
                                <td><?php echo $pending['date']; ?></td>
                                <td><?php echo $pending['delete_status']; ?></td>

                            </tr>
                        <?php endforeach; ?>




                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-lg-6">
                    <hr>
                    <h3>Denied requests
                    </h3>
                    <hr>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>List</th>
                            <th>Status</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($declinedlists as $pending): ?>
                            <tr>
                                <td><?php echo $pending['date']; ?></td>
                                <td><?php echo $pending['delete_status']; ?></td>

                            </tr>
                        <?php endforeach; ?>




                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>