<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Simple App</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Simple App</h1>
        <?php
        	require_once 'config.php';
          $conn = getDb();
         	$result = $conn->query("SELECT * FROM user_salary");
        ?>
        <div class="row justify-content-center">
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="bg-primary text-white">
                <th>ID</th>
                <th>UserID</th>
                <th>Salary</th>
              </tr>
            </thead>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tbody>
              <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["userid"]; ?></td>
                <td><?php echo $row["salary"]; ?></td>
              </tr>
            </tbody>
            <?php endwhile; ?>
          </table>
          </div>
          <div class="row justify-content-center">
            <a href="index.php?get_second_highest_salary" class="btn btn-info">Get Second Highest Salary</a>
          </div>
        <br>
      <?php
      	if(isset($_GET['get_second_highest_salary']))
      {
      	$result = $conn->query("SELECT id, userid, salary FROM user_salary WHERE salary = (SELECT DISTINCT salary FROM user_salary as emp1
                      WHERE (SELECT COUNT(DISTINCT salary)=2 FROM user_salary as emp2
                      WHERE emp1.salary <= emp2.salary)) ");
      ?>
      <div class="row justify-content-center">
          <table class="table table-striped table-bordered">
                <thead>
                  <tr class="bg-primary text-white">
                    <th>ID</th>
                    <th>UserID</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tbody>
                  <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["userid"]; ?></td>
                    <td><?php echo $row["salary"]; ?></td>
                  </tr>
                </tbody>
                <?php endwhile; ?>
            </table>
      </div>
    <?php } ?>
    </div>
  </body>
</html>
