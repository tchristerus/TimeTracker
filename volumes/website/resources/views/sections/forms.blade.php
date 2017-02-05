@section('register')
    <form method="POST">
        {{csrf_field()}}

        <div class="form-group label-floating is-empty">
            <label for="surname" class="control-label">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname">
        </div>

        <div class="form-group label-floating is-empty">
            <label for="lastname" class="control-label">Last name</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>

        <div class="form-group label-floating is-empty">
            <label for="email" class="control-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group label-floating is-empty">
            <label for="password" class="control-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group label-floating is-empty">
            <label for="password2" class="control-label">Re-enter password</label>
            <input type="password" class="form-control" id="password2" name="password2">
        </div>

        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="male" checked=""><span class="circle"></span><span class="check"></span>
                    Male
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="female"><span class="circle"></span><span class="check"></span>
                    Female
                </label>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-raised btn-info btn-block" value="Register"><div class="ripple-container"></div></a>
        </div>
    </form>
@endsection

@section('login')
    <form method="POST">
        {{csrf_field()}}
        <div class="form-group label-floating is-empty">
            <label for="email" class="control-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group label-floating is-empty">
            <label for="password" class="control-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" checked="" name="remember_me"><span class="check"></span></span> Remember me
                </label>
            </div>
            <input type="submit" class="btn btn-raised btn-info btn-block" value="Login"><div class="ripple-container"></div></a>
        </div>
    </form>
@endsection