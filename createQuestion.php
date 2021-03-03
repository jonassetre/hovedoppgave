<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header</title>
    <script src="frontend/index.js"></script>
</head>

<body>
<div class="container">
    <div class="question-container">
        <div class="questionTop">
            <a class="backToGroup" onclick=""> Tilbake til grupper</a>
        </div>

        <div class="questionDown">
            <form class="formQuestion" action="" method="POST">
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
                            <input class="inputQuestionPoeng" type="text" name="inputQuestionPoeng">
                            <span>poeng</span>
                        </label>

                    <div class="form-p2">
                    </div>
            </form>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</div>
</body>
</html>