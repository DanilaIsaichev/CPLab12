## Создание приложения-калькулятора, получающего данные через форму, и выводящего результаты вычислений на той же странице.

### Код для асинхронной отправки данных (фрагмент index.php):

```html
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(`#calcform`).on(`submit`, function(e) {
        e.preventDefault();
        $.ajax({
            url: `/index.php`,
            method: `POST`,
            data: $(this).serialize(),
            success: function(data) {
                $(`#result`).html(data);
            }
        });
    });
});
</script>
```

### Код формы, получающей данные для вычисления (фрагмент index.php):

```html
<form id="calcform" name="calcform" action="index.php" method="POST"> 
<input name="n1" type="number" placeholder="3" required pattern="1?[0-9]">
  <select name="op" id="operator">
    <option value="add">+</option>
    <option value="substract">-</option>  
    <option value="multiply">*</option> 
    <option value="divide">/</option>  
    <option value="exponentiate">^</option>         
  </select>
<input name="n2" type="number"  placeholder="4" required pattern="1?[0-9]">
<input type="submit">
<div id="result"></div>
</form>
```

### Код, отвечающий за вычисления и вывод данных (фрагмент index.php):

```php
$a = $_POST['n1'];
$o = $_POST['op'];
$b = $_POST['n2'];
switch ($o) {
  case "add":
  $res = $a + $b;
  echo "<p>{$a} + {$b} = {$res}</p>";
  break;
case "substract":
  $res = $a - $b;
  echo "<p>{$a} - {$b} = {$res}</p>";
  break;
case "multiply":
  $res = $a * $b;
  echo "<p>{$a} * {$b} = {$res}</p>";
  break;
case "divide":
  $res = $a / $b;
  echo "<p>{$a} / {$b} = {$res}</p>";
  break;
case "exponentiate":
  $res = $a ** $b;
  echo "<p>{$a} ^ {$b} = {$res}</p>";
  break;
}
```

### Код приложения (index.php):

```php
<?php
  if ($_SERVER['REQUEST_METHOD'] === "GET") {
    echo '
<html>
  <head>
    <title>Lab 12</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $(`#calcform`).on(`submit`, function(e) {
            e.preventDefault();
            $.ajax({
                url: `/index.php`,
                method: `POST`,
                data: $(this).serialize(),
                success: function(data) {
                    $(`#result`).html(data);
                }
            });
        });
    });
    </script>
  </head>
  <body>
    <form id="calcform" name="calcform" action="index.php" method="POST"> 
    <input name="n1" type="number" placeholder="3" required pattern="1?[0-9]">
      <select name="op" id="operator">
        <option value="add">+</option>
        <option value="substract">-</option>  
        <option value="multiply">*</option> 
        <option value="divide">/</option>  
        <option value="exponentiate">^</option>         
      </select>
    <input name="n2" type="number"  placeholder="4" required pattern="1?[0-9]">
    <input type="submit">
    <div id="result"></div>
    </form>
  </body>
</html>';
  }

  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $a = $_POST['n1'];
    $o = $_POST['op'];
    $b = $_POST['n2'];
    switch ($o) {
      case "add":
      $res = $a + $b;
      echo "<p>{$a} + {$b} = {$res}</p>";
      break;
    case "substract":
      $res = $a - $b;
      echo "<p>{$a} - {$b} = {$res}</p>";
      break;
    case "multiply":
      $res = $a * $b;
      echo "<p>{$a} * {$b} = {$res}</p>";
      break;
    case "divide":
      $res = $a / $b;
      echo "<p>{$a} / {$b} = {$res}</p>";
      break;
    case "exponentiate":
      $res = $a ** $b;
      echo "<p>{$a} ^ {$b} = {$res}</p>";
      break;
    }
  }
?>
```

## Вывод:

В ходе выполнения лабораторной работы были получены навыки работы с языком программирования php и ajax.

Было создано приложение калькулятор.
