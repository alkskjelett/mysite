<?php
require_once __DIR__ . '\incs\functions.php';
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
            </div>
            <div class="box box3">
                <button type="submit" name="exit_btn" value="true" class="submitbutton delete">Выйти</button>
                <button type="submit" name="delete_btn" value="true" class="submitbutton delete">Удалить аккаунт</button>
            </div>
            <div class="box box4"><p><h2>Расписание:</h2></p>
                <table>
                    <tr>
                        <td class="col1"><b>9:00</b></td>
                        <td class="col2"><button id="1" name="session_btn" value="9:00">Смешарики</button></td>
                    </tr>
                    <tr>
                        <td class="col1"><b>10:30</b></td>
                        <td class="col2"><button id="2" name="session_btn" value="10:30">Трансформеры</button></td>
                    </tr>
                    <tr>
                        <td class="col1"><b>12:30</b></td>
                        <td class="col2"><button id="3" name="session_btn" value="12:30">Русалочка</button></td>

                    </tr>
                    <tr>
                        <td class="col1"><b>14:00</b></td>
                        <td class="col2"><button id="4" name="session_btn" value="14:00">Русалочка</button></td>
                    </tr>
                    <tr>
                        <td class="col1"><b>17:30</b></td>
                        <td class="col2"><button id="5" name="session_btn" value="15:30">Лалалэнд</button></td>
                    </tr>
                    <tr>
                        <td class="col1"><b>19:00</b></td>
                        <td class="col2"><button id="6" name="session_btn" value="17:30">Агенты А.Н.К.Л.</button></td>
                    </tr>
                    <tr>
                        <td class="col1"><b>21:00</b></td>
                        <td class="col2"><button id="7" name="session_btn" value="19:00">Джентельмены</button></td>
                    </tr>
                    <tr>
                        <td class="col1"><b>23:00</b></td>
                        <td class="col2"><button id="8" name="session_btn" value="21:00">Джентельмены</button></td>
                    </tr>
                    <tr>
                        <td class="col1"><b>1:00</b></td>
                        <td class="col2"><button id="9" name="session_btn" value="23:00">Бойцовский клуб</button></td>
                    </tr>
                    <tr>
                        <td class="col1"><b>1:00</b></td>
                        <td class="col2"><button id="10" name="session_btn" value="1:00">Оно</button></td>
                    </tr>
                </table>
                <?php
                if(isset($_POST['session_btn'])) {
                    session_start();
                    $_SESSION['session_time'] = $_POST['session_btn'];
                    header("Location: hall.php");
                }
                else if(isset($_POST['delete_btn']) && $_POST['delete_btn'] == true) {
                    delete($_COOKIE['user']);
                    header("Location: index.php");
                }
                else if(isset($_POST['exit_btn']) && $_POST['exit_btn'] == true) {
                    header("Location: index.php");
                }
                ?>
            </div>
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
