<!-- Assignment-11 – COSC 2328 – Professor McCurry -->
<!-- Implemented by - Analee Maharaj -->
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="./css/menuStyle.css">
      <script type="text/javascript" src="js/menuScript.js"></script> 
      <title>Tacos</title>
    </head>
    <?php $phone = $_GET['phone']?>
    <body id="container" class="russiangreen">
      <div id="top" class="topline darkseagreen">
        <img src="images/logo.webp" alt="foodtruck logo" class="topline">
        <h1 id="title" class="topline">Tacos!</h1>
      </div>
      <div id="bottom" class="bottomline">
        <div id="Menu-container" class="container">
          <h2 class="Menu-titlebar">Menu</h2>
          <article id="Menu" class="category">
          </article>
        </div>
        <div id="columnR" class="column-right">
          <h3 id="cart-title" class="column-title cart-title">Cart</h3>
          <!--<ul id="cart-body" class="column-body cart-body"></ul>-->
          <form id="cart-body" class="column-body cart-body" action="./php/order.php" method="get">
            <hr>
            <div id="drinks">
              <label for="drinks-list">Choose a drink:</label>
              <select name="drinks" id="drinks">
                <option value="tea">tea</option>
                <option value="water">water</option>
                <option value="coke">coke</option>
                <option value="dr-pepper">dr. pepper</option>
                <option value="orange">orange</option>
              </select>
            </div>
            <input class="submit submit-order" name="order" type="submit" value="Order" />
          </form>

          <h3 id="details-title" class="column-title details-title">Details</h3>
          <ul id="details-body" class="column-body details-body">
            <?php include 'php/userquery.php';?>
          </ul>
        </div>
      </div>
    </body>
    <script id="scripts">
      addOptions("Menu");
      //addCartandDetails();
      //userForm();
      phonePrompt();
    </script>
</html>