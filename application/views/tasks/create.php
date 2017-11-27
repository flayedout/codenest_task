<?php //$alltasks = null; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12" >
            <div class="row">
                <div class="col-lg-6">
                    <h3>Create new task</h3>
                    <hr>

                        <form action="/task/create" method="post">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                            </div>

                            <select class="custom-select" name="list">
                                <option selected value="0">Select list for task</option>
                                <?php foreach ($alllists as $list): ?>
                                    <option value="<?php echo $list['id']; ?>"><?php echo $list['date']; ?></option>
                                <?php endforeach; ?>
                            </select>


                            <button class="btn btn-primary" type="submit">Create new task</button>

                        </form>

                </div>
            </div>
        </div>

    </div>
</div>