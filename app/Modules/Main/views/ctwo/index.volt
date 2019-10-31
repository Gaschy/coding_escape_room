{{ content() }}

<div class="row justify-content-center">
    <div class="col-12 col-lg-4">
        <div class="card login-card">
            <div class="card-body">
                <h1>Challenge Two</h1>
                <div id="vue-app">
                    <div class="row">
                        <div class="col-12">
                            <p class="mt-3 lead">Log in with your administrator password</p>
                            <form method="post" action="{{ url.get("ctwo/complete/challengeKey/") ~ challengeKey }}">
                                <div class="form-group">
                                <label for="challenge_passphrase">Password:</label>
                                    {{ password_field('password', 'class': "form-control", 'value': '', 'required': 'true') }}
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Log in</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
