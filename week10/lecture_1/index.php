<?php

    $days = range(1, 31);
    $months = [1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $years = range(1950, date('Y'));

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="process.php" method="post">
    <div>
        <label for="day">Day</label>
        <select name="day" id="day">
            <?php foreach ($days as $day) { ?>
            <option value="<?= $day ?>"><?= $day ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="month">Month</label>
        <select name="month" id="month">
            <?php foreach ($months as $key => $month) { ?>
            <option value="<?= $key ?>"><?= $month ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="year">Year</label>
        <select name="year" id="year">
            <?php foreach ($years as $year) { ?>
                <option value="<?= $year ?>"><?= $year ?></option>
            <?php } ?>
        </select>
    </div>
    <!--<div>
        <?php /*foreach ($months as $key => $month) { */?>
            <?php /*var_dump($month); */?>
            <?/*= $key */?>: <?/*= $month */?><br>
        <?php /*} */?>
    </div>-->
    <div>
        <label for="options">Options</label>
        <input type="checkbox" name="options[]" value="1" id="option_1">
        <label for="option_1">Option 1</label>
        <br>
        <input type="checkbox" name="options[]" value="2" id="option_2">
        <label for="option_2">Option 2</label>
        <br>
        <input type="checkbox" name="options[]" value="3" id="option_3">
        <label for="option_3">Option 3</label>
        <br>
        <input type="checkbox" name="options[]" value="4" id="option_4">
        <label for="option_4">Option 4</label>
        <br>
        <input type="checkbox" name="options[]" value="5" id="option_5">
        <label for="option_5">Option 5</label>
        <br>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
