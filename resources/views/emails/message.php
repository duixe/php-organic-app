<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="" style="width: 600px; padding: 15px; margin: 0 auto;">
      <h1>user message</h1>

      <p>user: <?= $data['name'] ?></p>
      <br>
      <p>user's email: <?= $data['email'] ?></p>
      <br>
      <h4>user's message:</h4>
      <hr>
      <p><?= $data['info'] ?></p>



    </div>
  </body>
</html>
