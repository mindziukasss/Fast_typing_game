var Fast_Typing = function () {
    const STATE_REGISTER = 'register';
    const STATE_LEVEL_SELECTOR = 'level_selector';
    const STATE_GAME = 'this_game';
    const STATE_GAMEOVER = 'game_end';

    var name;
    var last_state;
    var level;
    var score = 0;
    var saveULR;
    var start_time;
    var end_time;
    var game_time;
    var total_speed;
    var keyUpCount;

    this.setSaveURL = function (value) {
        saveULR = value;
    };
    /*--------------Register -----------------------------------------------------------------------------------------------*/
    var Register_Logics = function () {

        keyUpCount = 0;
        total_speed = 0;

        var view = $('#register');

        var input = $('#name');
        var go = $('#go');

        this.show = function () {
            view.removeClass('hidden');
            enable();

        };
        this.hide = function () {
            view.addClass('hidden');
            disable();
        };

        function enable() {
            go.attr('disabled', true);
            input.keyup(function () {
                if (input.val().length >= 3) {
                    go.attr('disabled', false)
                } else {
                    go.attr('disabled', true)
                }
            });
            go.click(function () {
                name = input.val();
                change_State(STATE_LEVEL_SELECTOR);

            });
        };

        function disable() {
            input.unbind();
            go.unbind();
            input.val('');
        };

    };

    var register = new Register_Logics();

    /*------------------------ Level ---------------------------------------------------------------------------------------*/

    var Level_Select_logic = function () {
        var view = $('#level');
        var play = $('#play');
        var gamerName = $('#gamerName');


        this.show = function () {
            view.removeClass('hidden');
            gamerName.html(name);
            enable();
        };
        this.hide = function () {
            view.addClass('hidden');
            disable();
        };

        function enable() {
            play.click(function () {
                level = $('input[name = play]:checked').val();
                start_time = Date.now();
                change_State(STATE_GAME);
            })
        }

        function disable() {
            play.unbind();

        };

    };

    var level_sector = new Level_Select_logic();

    /*--------------------- game -------------------------------------------------------------------------------------------*/
    var Game_Logic = function () {
        var view = $('#game');
        var letters = 'abcdefghjklmnopuytrwqsvxz';
        var timeOut;
        var letterKey;
        var letter_show = $('#point');
        var gamer = $('#gamer');
        var livesCount;
        var userInput = true;
        var is_GoldenLetter;
        var timeAmount;

        var letter_show_now;
        var letter_click;
        var amount;


        this.show = function () {
            view.removeClass('hidden');
            gamer.html(name);
            livesCount = 3;
            score = 0;
            change_letter();
            enable();


        };
        this.hide = function () {
            view.addClass('hidden');
            disable();
        };


        function updateScore() {

            if ((score % 20) === 0 && score !== 0) {
                livesCount += 1;
                $('#live').html(livesCount);
            }
            if (is_GoldenLetter) {

                is_GoldenLetter = false;
                for (var i = 0; i < 5; i++) {
                    updateScore();
                }
            } else {
                score += 1;
            }

            $('#score').html(score);
        }

        function removeLive() {

            livesCount -= 1;
            $('#live').html(livesCount);


            if (livesCount === 0) {
                end_time = Date.now();
                games_time();
                change_State(STATE_GAMEOVER);
            }
        }

        function enable() {

            $(window).keydown(
                function () {
                    letter_show.addClass('active')
                });
            $(window).keyup(
                function (e) {
                    letter_show.removeClass('active')
                    if (e.key === letters[letterKey]) {
                        updateScore()
                        count_speed()
                    } else {
                        removeLive()
                    }
                    letter_click = Date.now();
                    setTime();

                    userInput = true;
                    change_letter();
                });

        }

        function setTime() {

            amount = (letter_click - letter_show_now) * 0.001;
            $('#second').html(parseFloat(amount).toFixed(2));
        }

        function games_time() {

            game_time = (end_time - start_time) * 0.001;
            game_time = game_time.toString();
        }


        function count_speed() {
            timeAmount = Date.now() - letter_show_now;
            total_speed += timeAmount;
            keyUpCount++;

            //game now show this line need
            // $('#time-amount').html(parseFloat(timeAmount * 0.001).toFixed(2));

        }


        function change_letter() {


            if (!userInput) {
                removeLive()
            }
            clearTimeout(timeOut);

            if (livesCount <= 0)
                return;

            if (Math.random() < 0.1) {
                is_GoldenLetter = true;
                letter_show.addClass('golden');
            } else {
                is_GoldenLetter = false;
                letter_show.removeClass('golden');
            }

            userInput = false;
            letterKey = Math.round(Math.random() * (letters.length - 1))
            letter_show.html(letters[letterKey]);
            letter_show_now = Date.now();
            timeOut = setTimeout(change_letter, level * 1000);
        }

        function disable() {
            $(window).unbind();
            clearTimeout(timeOut);
        }
    };

    var game = new Game_Logic();

    /*-----------------------gameOver   --------------------------------------------------------------------------------------------*/
    var Game_Logic_Over = function () {
        var gamer = $('#gamers');
        var scores = $('#scores');
        var newGame = $('#newGame');

        var view = $('#gameOver');

        this.show = function () {
            view.removeClass('hidden');
            gamer.html(name);
            scores.html(score);
            saveData();

            function saveData() {

                $.ajax({
                    url: saveULR,
                    method: "POST",
                    data: {
                        name: name,
                        level: level,
                        score: score,
                        game_time: game_time,
                        average_speed: (parseFloat((total_speed / keyUpCount) * 0.001).toFixed(2))
                    }
                });
            }

        };
        this.hide = function () {
            view.addClass('hidden');
            disable();
        };

        newGame.click(function () {
            change_State(STATE_REGISTER);
        });

        function disable() {
            $(window).unbind();
            gamer.unbind();
            scores.unbind();
        }
    };

    var game_over = new Game_Logic_Over();

    /*------------------- change Status-------------------------------------------------------------------------------------*/

    function change_State(value) {
        if (last_state)
            last_state.hide();
        switch (value) {
            case STATE_REGISTER:
                last_state = register;
                break;
            case STATE_LEVEL_SELECTOR:
                last_state = level_sector;
                break;
            case STATE_GAME:
                last_state = game;
                break;
            case STATE_GAMEOVER:
                last_state = game_over;
                break;

        }
        last_state.show();
    }

    change_State(STATE_REGISTER);

}