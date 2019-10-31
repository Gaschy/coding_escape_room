{{ content() }}

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card login-card">
            <div class="card-body">
                <h1>Challenge Four</h1>
                <h3 class="mt-3 mb-3">Programming challenge two</h3>
                <div id="vue-app">
                    <div class="row">
                        <div class="col-12">
                            <p>You are given a string representing a website's address. To calculate the IP address you must convert all the characters into ASCII code, then calculate the sum of the values.</p>
                            <p>The first IP number will be the result mod 256. The second IP number will be the double of the sum mod 256, the third will be the triple of the sum mod 256 and the fourth will be quadruple of the sum, mod 256.</p>
                            <hr/>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <p class="lead">Input:</p>
                                    <p>A string representing the website address</p>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <p class="lead">Output:</p>
                                    <p>An array containing the IP value </p>
                                </div>
                                <div class="col-12"><hr/></div>
                                <div class="col-12 col-lg-6">
                                    <p class="lead">Examples:</p>
                                    <dl>
                                        <dd>f('www.codewars.com')   ---> [88, 176, 8, 96]</dd>
                                        <dd>f('www.starwiki.com')   ---> [110, 220, 74, 184]</dd>
                                    </dl>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <p class="lead">Restrictions :</p>
                                    <dl>
                                        <dd><b>Code length: <= 77 characters</b></dd>
                                        <dd>"require" is forbidden</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <hr/>
                            <p class="lead">Tip: Test your solution on <a target="_blank" href="https://www.codewars.com/kata/ip-address-finder-code-golf/train/javascript">Codewars</a> and paste your solution here.</p>
                            <form method="post" action="{{ url.get("cfour/complete/challengeKey/") ~ challengeKey }}">
                                <div>
                                    <code-editor
                                            init-value="f=inp=>...."
                                    />
                                </div>
                                <div class="text-center mt-5">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
