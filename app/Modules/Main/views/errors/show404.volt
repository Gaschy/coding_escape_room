{{ content() }}

<div class="row justify-content-center">
    <div class="col-12 col-lg-4">
        <div class="card login-card">
            <div class="card-body">
                <h1>Page not found</h1>
                <div class="text-center">
                    <p class="lead mt-3">Sorry, you have accesed a page that does not exist or was moved.</p>
                    <p>{{ link_to('index/index', 'Start Coding Challenge', 'class': 'btn btn-primary') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
