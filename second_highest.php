<?php require "includes/site_config.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require "includes/header.php"; ?>
  </head>
  <body>
    <?php require "includes/top_design.php"; ?>
<?php include("includes/nav.php");?>
    <div class="container">
        <h2>MySQL Query</h2>
        <?php
        	require_once 'includes/db_config.php';
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
            <a href="?get_second_highest_salary" class="btn btn-info">Get Second Highest Salary</a>
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
    <?php include("includes/footer.php");?>
  </body>
</html>
