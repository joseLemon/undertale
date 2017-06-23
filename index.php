<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>undertale</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
</head>
<body>
<div class="container">
    <div class="character sans">
        <img class="center-block glitch-img" src="img/sans_standing.gif" alt="sans_standing">
        <span class="speech">
            <span class="text-container"></span>
        </span>
        <audio src="audio/sans_talk.mp3"></audio>
    </div>
    <div class="character papyrus">
        <span class="speech">
            <span class="text-container"></span>
        </span>
        <audio src="audio/papyrus_talk.mp3"></audio>
    </div>
    <div class="character drums">
        <audio src="audio/ba_dum_tss.mp3"></audio>
    </div>
</div>
<script>

    function showText(target, message, index, interval, internal, audio) {
        if (index < message.length) {
            $('body').addClass('click-disabled');
            audio.play();
            if(internal) {
                $(target).append(message[index++]);
            } else {
                $(target).text(message[index++]);
            }
            setTimeout(function () {
                showText(target, message, index, interval, true, audio);
            }, interval);
        } else {
            $('body').removeClass('click-disabled');
        }
    }

    var click = 0;
    $(document).click(function () {
        if(!$('body').hasClass('click-disabled')) {
            var speech = '.sans .speech .text-container';
            var message = 'heya buddy.';
            var audio = $('.sans audio')[0],
                papyrus_audio = $('.papyrus audio')[0],
                drums_audio = $('.drums audio')[0];
            var sans_speech = $('.sans .speech'),
                papyrus_speech = $('.papyrus .speech');
            switch (click) {
                case 0:
                    sans_speech.addClass('active');
                    break;
                case 1:
                    message = 'so... hey kid, I\'m trying to help a friend out';
                    break;
                case 2:
                    message = 'he is a little "numbskull" and can\'t find the right words';
                    break;
                case 3:
                    sans_speech.removeClass('active');
                    papyrus_speech.addClass('active');
                    speech = '.papyrus .speech .text-container';
                    message = 'NO I\'M NOT!!!';
                    audio = papyrus_audio;
                    break;
                case 4:
                    sans_speech.addClass('active');
                    papyrus_speech.removeClass('active');
                    message = 'but he is a dear';
                    break;
                case 5:
                    message = '...a papydear';
                    break;
                case 6:
                    sans_speech.removeClass('active');
                    audio = drums_audio;
                    break;
                case 7:
                    sans_speech.addClass('active');
                    message = 'ya\' now, this buddy of yours is a sweet guy';
                    break;
                case 8:
                    message = 'and he truly cares for you';
                    break;
                case 9:
                    message = 'he\'d do anything to see you smile';
                    break;
                case 10:
                    message = '\'course, you already now that';
                    break;
                case 11:
                    message = 'what I\'m trying to get at is...';
                    break;
                case 12:
                    message = 'both of you would make a cute couple';
                    break;
                case 13:
                    message = 'and surely you\'d be very happy together';
                    break;
                case 14:
                    message = 'and you\'d eat lots of food';
                    break;
                case 15:
                    sans_speech.removeClass('active');
                    papyrus_speech.addClass('active');
                    speech = '.papyrus .speech .text-container';
                    message = 'THE BEST SPAGHETTI AROUND NYEHEHE!!!';
                    audio = papyrus_audio;
                    break;
                case 16:
                    sans_speech.addClass('active');
                    papyrus_speech.removeClass('active');
                    message = 'hopefully you\'ll put some ketchup on that';
                    break;
                case 17:
                    message = 'anyway, so here\'s up to you';
                    break;
                case 18:
                    message = 'will you give the guy a chance?';
                    break;
            }

            if(click < 19) {
                showText(speech, message, 0, 70, false, audio);
            } else {
                $('.sans').addClass('fade_out');
            }

            click++;
        }
    });

</script>
</body>
</html>
