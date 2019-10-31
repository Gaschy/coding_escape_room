{{ content() }}

<div class="row justify-content-center">
    <div class="col-12 col-lg-6">
        <div class="card login-card">
            <div class="card-body">
                <h1>Challenge Five</h1>
                <div id="vue-app">
                    <td class="row">
                        <div class="col-12">
                            <p class="mt-3 lead">Insert the values of the correct answer options at the bottom of the page.</p>

                            <p><b>1) What does asynchronous mean?</b></p>
                            <table class="table table-striped table-sm table-hover">
                                <thead>
                                    <th class="text-center" style="min-width: 75px">Value</th>
                                    <th>Answer</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">2</td>
                                        <td>Order of operation</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">8</td>
                                        <td>A script will send a request to the server, and continue its execution without waiting for the reply</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">4</td>
                                        <td>A task calls another task</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">1</td>
                                        <td>One task waits for the next task to finish before running</td>
                                    </tr>
                                </tbody>
                            </table>

                            <br/>

                            <p><b>2) Which SQL statement would you use to select all books whose title starts with 'A'?</b></p>
                            <table class="table table-striped table-sm table-hover">
                                <thead>
                                <th class="text-center" style="min-width: 75px">Value</th>
                                <th>Answer</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center align-middle">1</td>
                                    <td>SELECT * FROM BOOK_INFORMATION WHERE BOOK_TITLE LIKE 'A';</td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">4</td>
                                    <td>SELECT * FROM BOOK_INFORMATION WHERE BOOK_TITLE IN 'A';</td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">8</td>
                                    <td>SELECT * FROM BOOK_INFORMATION WHERE BOOK_TITLE LIKE 'A%';</td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">2</td>
                                    <td>SELECT * FROM BOOK_INFORMATION WHERE BOOK_TITLE LIKE '%A'; </td>
                                </tr>
                                </tbody>
                            </table>

                            <br/>

                            <p><b>3) Who is the greatest developer of 2019?</b></p>
                            <table class="table table-striped table-sm table-hover">
                                <thead>
                                <th class="text-center" style="min-width: 75px">Value</th>
                                <th>Answer</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center align-middle">1</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid c5-option-image" src="{{ url.get("img/c5_option_1.jpg") }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">2</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid c5-option-image" src="{{ url.get("img/c5_option_2.jpg") }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">4</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid c5-option-image" src="{{ url.get("img/c5_option_4.png") }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">8</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid c5-option-image" src="{{ url.get("img/c5_option_8.jpg") }}">
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <form method="post" action="{{ url.get("cfive/complete/challengeKey/") ~ challengeKey }}">
                                <div class="form-group mt-5">
                                    <label for="challenge_passphrase">Solution:</label>
                                    <div class="d-flex justify-content-between">
                                        <number-input name="solution[]" :value="0" :min="0" :max="9" :inputtable="false" inline controls></number-input>
                                        <number-input name="solution[]" :value="0" :min="0" :max="9" :inputtable="false" inline controls></number-input>
                                        <number-input name="solution[]" :value="0" :min="0" :max="9" :inputtable="false" inline controls></number-input>

                                    </div>
                                </div>
                                <div class="text-center">
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
