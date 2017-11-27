<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="padding:1.5rem">
                <h3>Register</h3>
                <form method="post" action="/login/register">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>


            </div>
        </div>
    </div>
</div>