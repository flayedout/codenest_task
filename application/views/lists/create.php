<?php //$alltasks = null; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12" >
            <div class="row">
                <div class="col-lg-6">
                    <h3>Create new list</h3>
                    <hr>

                    <form action="/list/create" method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="datepick"  name="date" placeholder="Choose a date">
                        </div>




                        <button class="btn btn-primary" type="submit">Create</button>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>