
{{ content() }}

<div class="jumbotron">
    <h1>Unauthorized</h1>
    {% if isLoggedIn is defined AND isLoggedIn %}
        <p>You don't have access to this option. Contact an administrator</p>
        <p>{{ link_to('index', 'Home', 'class': 'btn btn-primary') }}</p>
    {% else %}
        <p>You don't have access to this option. Please log in.</p>
        <p>{{ link_to('index', 'Log in', 'class': 'btn btn-primary') }}</p>
    {% endif %}
</div>
