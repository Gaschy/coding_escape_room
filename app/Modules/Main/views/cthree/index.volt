{{ content() }}

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card login-card">
            <div class="card-body">
                <h1>Challenge Three</h1>
                <h3 class="mt-3 mb-3">Programming challenge one</h3>
                <div id="vue-app">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <p class="lead">Your task is to add up letters to one letter.</p>
                            <p>The function will be given a variable amount of arguments, each one being a letter to add.</p>
                            <p class="lead">Notes:</p>
                            <ul>
                                <li>Letters will always be lowercase.</li>
                                <li>Letters can overflow (see second to last example of the description)</li>
                                <li>If no letters are given, the function should return 'z'</li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p class="lead">Examples:</p>
                            <dl>
                                <dd>addLetters('a', 'b', 'c') = 'f'</dd>
                                <dd>addLetters('a', 'b') = 'c'</dd>
                                <dd>addLetters('z') = 'z'</dd>
                                <dd>addLetters('z', 'a') = 'a'</dd>
                                <dd>addLetters('y', 'c', 'b') = 'd' // notice the letters overflowing</dd>
                                <dd>addLetters() = 'z'</dd>
                            </dl>
                        </div>
                        <div class="col-12 mt-3">
                            <hr/>
                            <p class="lead">Tip: Test your solution on <a target="_blank" href="https://www.codewars.com/kata/alphabetical-addition/train/javascript">Codewars</a> and paste your solution here.</p>
                            <form method="post" action="{{ url.get("cthree/complete/challengeKey/") ~ challengeKey }}">
                                <div>
                                    <code-editor
                                            init-value="function addLetters(...letters) {}"
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
