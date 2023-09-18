<?php
include "get-history.php";
session_start();
if(isset($_SESSION['qrcode'])){
  $qrcode = $_SESSION['qrcode'];
  $text = $_SESSION['text'];
  $image_size = $_SESSION['image_size'];
  $font_size = $_SESSION['font_size'];
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>PHP QR-Code Generator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <header>
  <nav class="navbar bg-dark mb-5">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">
      PHP QR-Code Generator
    </a>
  </div>
</nav>
  </header>
  <main>
    <div class="container">
        <div class="section">
          <form class="form-control mb-5" action="generate-qrcode.php" method="post">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="text" placeholder="String" value="<?php echo $text ?? ''; ?>">
              <label for="floatingInput">String : </label>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" name="image_size" placeholder="Image Size" value="<?php echo $image_size ?? 300; ?>">
                  <label for="floatingInput">Image Size : </label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" name="font_size" placeholder="Font Size" value="<?php echo $font_size ?? '20'; ?>">
                  <label for="floatingInput">Font Size : </label>
                </div>
              </div>
            </div>
            <?php
              if (isset($qrcode)) {
                echo '<img class="img-fluid rounded mx-auto d-block mb-3" src="data:image/png;base64,'.$qrcode.'" alt="QR-Code">';
              }
            ?>
            <button type="submit" name="submit" class="btn btn-dark w-100">Generate QR-Code</button>
          </form>
          <div class="container text-center mb-5">
            <div class="row row-cols-4 g-2">
              <?php get_images(); ?>
            </div>
          </div>
        </div>
    </div>
  </main>
  <footer>
          
  </footer>
  <script src="assets/js/popper.min.js">
  </script>

  <script src="assets/js/bootstrap.min.js">
  </script>
  <script>
    console.log("Developed by : Hash'J Programming ❤️");
  </script>
</body>

</html>