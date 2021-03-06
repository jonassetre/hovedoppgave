<?php
require_once 'src/App.php';
require_once 'src/Model/Answer.php';
require_once 'header.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['group'])) {
    $idGroup = $_GET['group'];
    $data = $app->getGroupByGroupId($idGroup);
}

if (isset($_POST['btnSaveQuestion'])){

    $ref_destination = 'subject.php?course=' . $data['Subject_idSubject'];
    if(!isset($_POST['inputQuestionDifficulty'])){
        $app->redirect('Spørsmål mangler vanskelighetsgrad, kan ikke legge til i databasen.', $ref_destination);
        return;
    }
    if(!isset($_POST['inputQuestionTagger'])){
        $app->redirect('Spørsmål mangler tag, kan ikke legge til i databasen.', $ref_destination);
        return;
    }
    if(!isset($_POST['inputQuestionPoeng'])){
        $app->redirect('Spørsmål mangler poeng, kan ikke legge til i databasen.', $ref_destination);
        return;
    }
    if(!isset($_GET['group'])){
        $app->redirect('Spørsmål tilhører ikke en gruppe, kan ikke legge til i databasen.', $ref_destination);
        return;
    }

    if(!isset($_POST['inputAnswers'])){
        $app->redirect('Spørsmål må ha minst et riktig og et galt svaralternativ, kan ikke legge til i databasen.', $ref_destination);
        return;
    }

    $answers = json_decode($_POST['inputAnswers'], true);

    if(count($answers) < 2){
        $app->redirect('Spørsmål må ha minst et riktig og et galt svaralternativ, kan ikke legge til i databasen.', $ref_destination);
        return;
    }

    $diffDegree = utf8_decode($_POST['inputQuestionDifficulty']);
    $tag = $_POST['inputQuestionTagger'];
    $score = $_POST['inputQuestionPoeng'];
    $Group_idGroup = $_GET['group'];
    $questContent = htmlspecialchars($_POST['inputQuestionContent']);

    if($app->createQuestion($questContent, $diffDegree, $tag, $score, $Group_idGroup, $answers)){
        $app->redirect('Nytt spørsmål ble lagt til.', $ref_destination);
    }
    else{
        $app->redirect('Noe gikk galt, kunne ikke legge til spørsmål.', $ref_destination);
    }
}
?>

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
        <form action="" name="createQuestionForm" id="createQuestionFormId" onsubmit="getTextEditorTextAndAnswers()" method="post">
            <div class="container">
                <div class="question-container">
                    <div class="questionTop">
                        <a class="backToGroup" onclick="window.location.href='subject.php';"> Tilbake til grupper</a>
                    </div>

                    <div class="questionDown">
                        <div class="form-p1">
                            <label>
                                <input class="inputQuestionGroupName" type="text" name="inputQuestionGroupName" value="<?php echo $data['groupName'] ?>" >
                            </label>

                            <select id="dropdown2" name="inputQuestionDifficulty" size="1">
                                <option value="Enkel">Enkel</option>
                                <option value="Middels">Middels</option>
                                <option value="Høy">Høy</option>
                            </select>

                            <label>
                                <input class="inputQuestionPoeng" type="text" name="inputQuestionPoeng" required>
                                <span>poeng</span>
                            </label>

                            <div class="form-p2">
                                <div id="editor" name="textEditor" contenteditable="false">
                                    <section id="toolbar" name="toolbar">
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
                                <input type="hidden" name="inputQuestionContent" id="inputQuestionContentId">
                                <script src="frontend/script.js"></script>
                            </div>
                            <label>
                                <h4>#tagger <input class="inputQuestionTagger" type="text" name="inputQuestionTagger" required placeholder="Skriv minst et nøkkelord">
                                </h4>
                            </label>
                            <div class="form-p3">
                                <h4>Svar:</h4>
                                <div id="editor">
                                    <div id="correctAnswerForm">
                                        <div class="correctAnswer">
                                            <label for="name">Riktig svar</label>
                                            <input class="inputQuestion" type="text" name="inputQuestion"  required placeholder="">

                                            <label for="name">Kommentar </label>
                                            <input class="inputComment" type="text" name="inputComment"  placeholder="">
                                        </div>
                                    </div>
                                    <div id="wrongAnswerForm">
                                        <div class="wrongAnswer">
                                            <label for="name">Mulig svar</label>
                                            <input class="inputQuestion" type="text" name="inputQuestion" required placeholder="">

                                            <label for="name">Kommentar</label>
                                            <input class="inputComment" type="text" name="inputComment" placeholder="">
                                        </div>
                                    </div>
                                    <!--
                                    Vi har foreløpig ingenting i databasen for å lagre en slik kommentar, så jeg tar den ut for øyeblikket
                                    <div class="generellComment">
                                        <label for="name">Generelle kommentarer til
                                            testen</label>
                                        <input class="inputGenerellComment" type="text" name="inputGenerellComment"
                                               placeholder="">
                                    </div>
                                    -->
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

                                <input type="hidden" name="inputAnswers" id="inputAnswersId">

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
        </form>
        <script>
            class Answer {
                content = "";
                is_correct = false;
                comment = "";
                constructor(answerContent, answerComment, isCorrect) {
                    this.content = answerContent;
                    this.comment = answerComment;
                    this.is_correct = isCorrect;
                }
            }
            function getTextEditorTextAndAnswers() {
                var content = document.getElementById('page').innerHTML;
                document.getElementById('inputQuestionContentId').value = content;

                var answers = [];

                var correctAnswerForm =  document.getElementById('correctAnswerForm');
                var allCorrectAnswerDivs = correctAnswerForm.getElementsByClassName('correctAnswer');
                for(var i = 0; i < allCorrectAnswerDivs.length; i++) {
                    var inputQuestion = allCorrectAnswerDivs[i].getElementsByClassName('inputQuestion');
                    var inputComment = allCorrectAnswerDivs[i].getElementsByClassName('inputComment');
                    console.log(i + ': ' + inputQuestion[0].value + ', ' + inputComment[0].value);
                    answers.push(new Answer(inputQuestion[0].value, inputComment[0].value, 1));

                }

                var wrongAnswerForm =  document.getElementById('wrongAnswerForm');
                var allWrongAnswerDivs = wrongAnswerForm.getElementsByClassName('wrongAnswer');
                for(var i = 0; i < allWrongAnswerDivs.length; i++) {
                    var inputQuestion = allWrongAnswerDivs[i].getElementsByClassName('inputQuestion');
                    var inputComment = allWrongAnswerDivs[i].getElementsByClassName('inputComment');
                    answers.push(new Answer(inputQuestion[0].value, inputComment[0].value, 0));
                }
                document.getElementById('inputAnswersId').value = JSON.stringify(answers);
            }
        </script>
        <script src="frontend/script.js"></script>
    </body>
</html>