{{ content() }}

<div class="row justify-content-center">
    <div class="col-12 col-lg-4">
        <div class="card login-card" style="margin-top: 50px">
            <div class="card-body">
                <h1>Congratulations</h1>
                <div id="vue-app">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="mt-3 lead">Go to <a target="_blank" href="https://displate.com/displate/1310784">Displate</a> and choose a price.</p>
                        </div>

                        <div class="col-12 text-center">
                            <p class="mt-3 lead">
                                The project is available on GitHub
                                <br/>
                                <a target="_blank" href="https://github.com/Gaschy/coding_escape_room">https://github.com/Gaschy/coding_escape_room</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ url.get("dist/js/plugins/three.r92.min.js") }}"></script>
<script src="{{ url.get("dist/js/plugins/vanta.birds.min.js") }}"></script>
<script>
    $('body').prepend(
        '<div id="birdContainer" style="position: absolute; width: 100%; height: 100%"></div>'
    );
    $("#content").css("margin-top", "0");
    VANTA.BIRDS({
        el: "#birdContainer",
        separation: 1.00
    })
</script>
