//define template
function newCorrectAnswer() {
    var template = $('#correctAnswerForm .correctAnswer:first').clone();

//define counter
    var sectionsCount = 1;

//add new section

        //increment
        sectionsCount++;

        //loop through each input
        var section = template.clone().find(':input').each(function () {

            //set id to store the updated section number
            var newId = this.id + sectionsCount;

            //update for label
            $(this).prev().attr('for', newId);

            //update id
            this.id = newId;

        }).end()

            //inject new section
            .appendTo('#correctAnswerForm');
        return false;

}

function newWrongAnswer() {
    var template = $('#wrongAnswerForm .wrongAnswer:first').clone();

//define counter
    var sectionsCount = 1;

//add new section

    //increment
    sectionsCount++;

    //loop through each input
    var section = template.clone().find(':input').each(function () {

        //set id to store the updated section number
        var newId = this.id + sectionsCount;

        //update for label
        $(this).prev().attr('for', newId);

        //update id
        this.id = newId;

    }).end()

        //inject new section
        .appendTo('#wrongAnswerForm');
    return false;

}
$('.correctAnswer').on('click', '.remove', function() {
    //fade out section
    $(this).parent().fadeOut(300, function(){
        //remove parent element (main section)
        $(this).parent().parent().empty();
        return false;
    });
    return false;
});

