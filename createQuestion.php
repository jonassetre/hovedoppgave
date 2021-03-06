<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header</title>
    <script src="frontend/index.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    <div class="question-container">
        <div class="questionTop">
            <a class="backToGroup" onclick="window.location.href='subject.php';"> Tilbake til grupper</a>
        </div>

        <div class="questionDown">
            <div class="form-p1">
                <label>
                    <input class="inputQuestionName" type="text" name="inputQuestionName" placeholder="Navn...">
                </label>

                <select id="dropdown" name="dropdown" size="1">
                    <option value="Group">Gruppe 1</option>
                    <option value="Group">Gruppe 2</option>
                    <option value="Group">Gruppe 3</option>
                    <option value="Group">Gruppe 4</option>
                </select>

                <select id="dropdown" name="dropdown" size="1">
                    <option value="Group">Enkel</option>
                    <option value="Group">Middels</option>
                    <option value="Group">Høy</option>
                </select>
                <label>
                    <input class="inputQuestionPoeng" type="text" name="inputQuestionPoeng" placeholder="">
                    <span>poeng</span>
                </label>

                <div class="form-p2">
                    <div id="editor" contenteditable="false">
                        <section id="toolbar">
                            <div id="bold" class="icon fas fa-bold"></div>
                            <div id="italic" class="icon fas fa-italic"></div>
                            <div id="underline" class="icon fas fa-underline"></div>
                            <div id="insertUnorderedList" class="icon fas fa-list-ul"></div>
                            <div id="insertOrderedList" class="icon fas fa-list-ol"></div>
                            <div id="justifyLeft" class="icon fas fa-align-left"></div>
                            <div id="justifyRight" class="icon fas fa-align-right"></div>
                            <div id="justifyCenter" class="icon fas fa-align-center"></div>
                            <div id="justifyFull" class="icon fas fa-align-justify"></div>

                        </section>
                        <section id="page" contenteditable="true">
                        </section>
                    </div>
                    <script src="frontend/script.js"></script>
                </div>
                <div class="form-p3">
                    <h4>Svar:</h4>
                    <div id="editor">
                        <div id="correctAnswerForm">
                            <div class="correctAnswer">
                                <label for="name">Riktig svar</label>
                                <input class="inputQuestion" type="text" name="inputQuestion" placeholder="">

                                <label for="name">Kommentar </label>
                                <input class="inputComment" type="text" name="inputComment" placeholder="">
                            </div>
                        </div>
                        <div id="wrongAnswerForm">
                            <div class="wrongAnswer">
                                <label for="name">Mulig svar</label>
                                <input class="inputQuestion" type="text" name="inputQuestion" placeholder="">

                                <label for="name">Kommentar</label>
                                <input class="inputComment" type="text" name="inputComment" placeholder="">
                            </div>
                        </div>

                        <div class="generellComment">
                            <label for="name">Generelle kommentarer til
                                testen</label>
                            <input class="inputGenerellComment" type="text" name="inputGenerellComment"
                                   placeholder="">
                        </div>
                        <div>

                            <section id="page">
                                <button id="btnCorrect" type="button" onclick="newCorrectAnswer()" name="btnCorrect">+
                                    Riktig svar
                                </button>
                                <button id="btnFalse" type="button" name="btnFalse"
                                        onclick="newWrongAnswer()">+ Mulig svar
                                </button>
                            </section>
                        </div>
                    </div>

                    <button id="btnSaveQuestion" type="submit" name="btnSaveQuestion">Lagre</button>
                    <button id="btnCancel" type="button" name="button2"
                            onclick="window.location.href='subject.php';"
                            class="cancelbtn">Avbryt
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
<?php require_once 'footer.php'; ?>
<script src="frontend/jquery.js"></script>
<script src="frontend/app.js"></script>
</body>

</html>