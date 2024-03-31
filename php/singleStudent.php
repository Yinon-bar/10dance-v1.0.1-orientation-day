<?php
include "./connect.php";
// בגלל שעובדים שהפיפ מציג איי פי אייי בלבד אז אנחנו אומרים שהמידע שנקבל ונציג הוא בפורמט
// JSON
header('Content-Type: application/json');
// מאפשר לכל שרת מכל דומיין לפנות לאיי פי איי שלנו
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");

$get_id = 0;
if (isset($_GET["id"])) {
  $get_id = $_GET["id"];
}

$query = "SELECT * FROM students WHERE t_z_id = $get_id";

// conn.query();
// מחזיר את כל המידע שקיבל מהדי בי
$result = $conn->query($query);
// כמה רשומות חזרו
$rows = $result->num_rows;

$rowsData_ar = [];
while ($row = $result->fetch_assoc()) {
  // מוסיף למערך שיצרנו את השורה ויוסיף כל עוד מצליח להוציא שורות מהטבלה
  array_push($rowsData_ar, $row);
}

// print_r($rowsData_ar);
// תחזיר את המידע למי שקרא לך
echo json_encode($rowsData_ar);
