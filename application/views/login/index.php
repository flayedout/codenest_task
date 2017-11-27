

<div class="container">
    <div class="row">
        <div class="col-lg-12">

<!--            <div class="alert alert-warning alert-dismissible fade show" role="alert">-->
<!---->
<!--                <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->

            <div class="card" style="padding:1.5rem">
                <h3>Login</h3>




                <form method="post" action="/login/attempt">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>