<!DOCTYPE html>
<html>
<head>
  <title>Employee Management</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    form {
      margin-bottom: 16px;
    }

    input[type="text"], input[type="number"] {
      padding: 4px;
    }

    input[type="submit"] {
      padding: 8px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .delete-button {
      background-color: #f44336;
      color: white;
      border: none;
      cursor: pointer;
      padding: 4px;
    }

    .delete-button:hover {
      background-color: #d32f2f;
    }
  </style>
</head>
<body>
  <?php
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'mydb';

  $conn = mysqli_connect($host, $username, $password, $database);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Handle form submissions
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add new employee
    if (isset($_POST['add'])) {
      $name = $_POST['name'];
      $email = $_POST['mail'];
      $phone = $_POST['phone'];
      $age = $_POST['age'];
      $salary = $_POST['salary'];

      $sql = "INSERT INTO employees (name, mail, phone, age, salary) VALUES ('$name', '$email', '$phone', '$age', '$salary')";

      if (mysqli_query($conn, $sql)) {
        echo "New employee added successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    // Update employee
    if (isset($_POST['update'])) {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $email = $_POST['mail'];
      $phone = $_POST['phone'];
      $age = $_POST['age'];
      $salary = $_POST['salary'];

      $sql = "UPDATE employees SET name='$name', mail='$email', phone='$phone', age='$age', salary='$salary' WHERE id='$id'";

      if (mysqli_query($conn, $sql)) {
        echo "Employee updated successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }

    // Delete employee
    if (isset($_POST['delete'])) {
      $id = $_POST['id'];

      $sql = "DELETE FROM employees WHERE id='$id'";

      if (mysqli_query($conn, $sql)) {
        echo "Employee deleted successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }
  ?>

  <h2>Employee Management</h2>

  <form method="post">
    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required value="<?php echo isset($name) ? $name : ''; ?>"><br>

    <label for="mail">Mail:</label>
    <input type="text" id="mail" name="mail" required value="<?php echo isset($mail) ? $mail : ''; ?>"><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required value="<?php echo isset($phone) ? $phone : ''; ?>"><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required value="<?php echo isset($age) ? $age : ''; ?>"><br>

    <label for="salary">Salary:</label>
    <input type="number" id="salary" name="salary" required value="<?php echo isset($salary) ? $salary : ''; ?>"><br>

    <?php if (isset($id)): ?>
      <input type="submit" name="update" value="Update">
    <?php else: ?>
      <input type="submit" name="add" value="Add">
    <?php endif; ?>
  </form>

  <table>
    <tr>
      <th>Name</th>
      <th>Mail</th>
      <th>Phone</th>
      <th>Age</th>
      <th>Salary</th>
      <th></th>
    </tr>

    <?php
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['mail'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['salary'] . "</td>";
        echo "<td><form method='post'><input type='hidden' name='id' value='" . $row['id'] . "'><input class='delete-button' type='submit' name='delete' value='Delete'></form></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='6'>No employees found.</td></tr>";
    }
