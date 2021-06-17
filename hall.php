<?php
require_once __DIR__ . '/incs/functions.php';
require_once __DIR__ . '/incs/data.php';

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_POST['ready'])) {
    while (key($_POST) != null) {
        $places[] = key($_POST);
        next($_POST);
    }

    createOrder(selectId($_COOKIE['user']), selectSessionId($_SESSION['session_time']), $places);
}
?>

<! DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AliSky Cinema</title>
	<link href="Style.css" rel="stylesheet" type="text/css"> <!--Подключение стиля -->
	<link rel = "icon" href = "pics/AliSkyCinemaIcon.png" type = "image/x-icon"> <!--Загрузка иконки -->

</head>
<body>
    <form method="post">
        <div class="wrapper">
            <div class="box box1"><img class="img" src="pics\AliSkyCinema2.png"></div>
            <div class="box box2">
                <div class="inner-box21">
                    <div id="id3">Сегодня в кино</div>
                </div>
                <div class="inner-box22">
                    <video controls autoplay muted preload >
                        <source src="video\ricardo.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="inner-box23">
                    <table class="table"> <?php
                        $places = selectPlacesByTime($_SESSION['session_time']);
                        echo "<tr>";
                        for ($i = 11; $i < 70; $i++) {
                            $j = 0;
                            $InPlace = false;
                            while ($j < count($places)) {
                                if ($places[$j][0] == $i) {
                                    echo "<td><p><input type='checkbox' name='$i' disabled='disabled' class='checkbox'>$i</input></p></td>";
                                    $InPlace = true;
                                    break;
                                }
                                $j++;
                            }
                            if ($InPlace) continue;
                            if ($i % 10 == 0) {
                                echo "</tr>";
                                echo "<tr>";
                                $i++;
                            }
                            echo "<td><p><input type='checkbox' name='$i' class='checkbox'>$i</input></p></td>";
                        }
                        echo "</tr>";
                        ?>
                    </table>
                </div>
                <button type="submit" name="ready" class="submitbutton check">Купить</button>

            </div>
            <div class="box box3">
                <button class="btn"><a href="sessions.php" class="popa">Вернуться на главную</a></button>
                <?php
                if(isset($_POST['ready'])) {
                    echo "<p>Покупка билета прошла успешно</p>";
                }
                ?>
            </div>
            <div class="box box4"></div>
            <div class="footer">
                <div class="inner-footer1">
                    <div class="inner-inner-footer1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1187.1542321506506!2d30.295302006736925!3d59.97282959765371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcb137a6ad47a5da0!2z0KTQsNC60YPQu9GM0YLQtdGCINCh0YDQtdC00L3QtdCz0L4g0J_RgNC-0YTQtdGB0YHQuNC-0L3QsNC70YzQvdC-0LPQviDQvtCx0YDQsNC30L7QstCw0L3QuNGPINC90LDRhtC40L7QvdCw0LvRjNC90L7Qs9C-INC40YHRgdC70LXQtNC-0LLQsNGC0LXQu9GM0YHQutC-0LPQviDRg9C90LjQstC10YDRgdC40YLQtdGC0LAg0JjQotCc0J4!5e0!3m2!1sru!2sru!4v1623495625013!5m2!1sru!2sru" height="100" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="inner-inner-footer2">
                        <p>Адрес:</p>
                        <p>г.Санкт-Петербург, Песочная наб., 14</p>
                    </div>
                </div>
                <div class="inner-footer2"><img class="img2" src="pics\AliSkyCinemaText.png"></div>
                <div class="inner-footer3">
                    <p>По всем вопросам и предложениям обращайтесь:</p>
                    <p>+7(911)081-29-35</p>
                    <a href="https://vk.com/chelovekskelett" target="_blank"><img class="img3" src="pics\VK.png"></a>
                    <a href="https://twitter.com/ProfPopOff" target="_blank"><img class="img3" src="pics\Twitter.png"></a>
                    <a href="https://discord.gg/zsFMgg29mj" target="_blank"><img class="img3" src="pics\Discord.png"></a>
                </div>
            </div>
        </div>
    </form>

</body>
</html>
