<?php
include "./connect.php";
// בגלל שעובדים שהפיפ מציג איי פי אייי בלבד אז אנחנו אומרים שהמידע שנקבל ונציג הוא בפורמט
// JSON
header('Content-Type: application/json');
// מאפשר לכל שרת מכל דומיין לפנות לאיי פי איי שלנו
header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: PUT");


$query =  "SELECT * FROM students WHERE arrive = 1 ORDER BY first";

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

echo json_encode($rowsData_ar);
