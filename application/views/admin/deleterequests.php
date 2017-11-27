<?php //var_dump($pending) ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <hr>
            <h6>Requested lists from users to delete</h6>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>List Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pending as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['date']; ?></td>
                    <td><?php echo $item['delete_status']; ?></td>
                    <td>
                        <form action="/ajax/update" method="post">


                            <select class="custom-select" name="action">
                                <option selected value="0">Select action</option>
                                <option value="accept">Accept</option>
                                <option value="decline">Decline</option>
                            </select>
                            <input type="hidden" value="<?php echo $item['id'] ?>" name="id">

                            <button type="submit" class="btn btn-sm btn-danger">Submit</button>

                        </form>

                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>