{{ content() }}

<div class="row justify-content-center">
    <div class="col-12 col-lg-4">
        <div class="card login-card">
            <div class="card-body">
                <h1>Coding Escape Room</h1>
                <div id="vue-app">
                    <div class="row">
                        <div class="col-12">
                            <p class="mt-3 lead">Scanne den QR-Code und starte den Escape-Room</p>
                            <div class="d-flex justify-content-center">
                                <qrcode value="{{ url.get("challengeOne/index/uid/") ~ key }}" :options="{ width: 250 }"></qrcode>
                            </div>
                            <div class="text-center">
                                <a class="btn btn-primary" href="{{ url.get("challengeOne/index/uid/") ~ key }}">Zum Escape Room</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
