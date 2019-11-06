{{ content() }}

<div class="row justify-content-center">
    <div class="col-12 col-lg-4">
        <div class="card login-card">
            <div class="card-body">
                <h1>Challenge One</h1>
                <div id="vue-app">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <p class="mt-3 lead">The colors may hide a secret text</p>
                            <div class="color-block big" style="background-color: rgb(116, 104, 97)"></div>
                            <div class="color-block" style="background-color: rgb(116, 32, 119)"></div>
                            <div class="color-block" style="background-color: rgb(97, 115, 32)"></div>
                            <div class="color-block" style="background-color: rgb(101, 97, 115)"></div>
                            <div class="color-block" style="background-color: rgb(121, 33, 33)"></div>
                        </div>
                        <div class="col-12">
                            <form method="post" action="{{ url.get("cone/complete/challengeKey/") ~ challengeKey }}">
                                <div class="form-group">
                                <label for="challenge_passphrase">Challenge passphrase:</label>
                                    {{ password_field('challenge_passphrase', 'class': "form-control", 'value': '', 'required': 'true') }}
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">To the next challenge</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
