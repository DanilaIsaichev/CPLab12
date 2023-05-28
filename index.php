<html>
  <head>
    <title>PHP Test</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#calcform').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '/index.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    $('#result').html(data);
                }
            });
        });
    });
    </script>
  </head>
  <body>
  <?php 
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
      echo '<form id="calcform" name="calcform" action="index.php" method="POST"> 
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
    </form>';
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
  </body>
</html>
