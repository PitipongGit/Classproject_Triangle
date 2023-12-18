<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangle Type01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0BF9F2;
        }

        h1 {
            color: #007bff;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }

        h3 {
            margin-top: 20px;
            font-weight: bold;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }

        .equilateral {
            color: #28a745;
        }

        .isosceles {
            color: #ffc107;
        }

        .scalene {
            color: #17a2b8;
        }

        .right {
            color: #dc3545;
        }

        .not-a-triangle {
            color: #6c757d;
        }
    </style>
</head>
<body class="container text-center mt-5 p-5">
    <h1>ตรวจสอบสามเหลี่ยม</h1>
    
    <form action="" method="post" class="mt-3">
        <div class="row">
            <div class="col-md-4">
                <label for="side1"><h5>ด้านที่ 1 :</h5></label>
                <input type="number" step="0.01" name="side1" required max="100" class="form-control mt-4" placeholder="0.01-100.00">
            </div>

            <div class="col-md-4">
                <label for="side2"><h5>ด้านที่ 2 :</h5></label>
                <input type="number" step="0.01" name="side2" required max="100" class="form-control mt-4" placeholder="0.01-100.00">
            </div>

            <div class="col-md-4">
                <label for="side3"><h5>ด้านที่ 3 :</h5></label>
                <input type="number" step="0.01" name="side3" required max="100" class="form-control mt-4" placeholder="0.01-100.00">
            </div>
        </div>

        <div class="mt-5">
            <input type="submit" value="ตรวจสอบ" class="btn btn-success">
        </div>
    </form>

    <?php
    function checkTriangleType($side1, $side2, $side3) {
        if ($side1 <= 0 || $side2 <= 0 || $side3 <= 0) {
            return "ด้านต้องมีค่ามากกว่า 0";
        }

        if ($side1 + $side2 <= $side3 || $side2 + $side3 <= $side1 || $side1 + $side3 <= $side2) {
            return "Not a Triangle(ไม่ใช่สามเหลี่ยม)";
        }

        $sides = [$side1, $side2, $side3];
        sort($sides);

        if ($sides[0]**2 + $sides[1]**2 == $sides[2]**2) {
            return "right triangle(สามเหลี่ยมมุมฉาก)";
        }

        if ($side1 == $side2 && $side2 == $side3) {
            return "equilateral triangle(สามเหลี่ยมด้านเท่า)";
        } elseif ($side1 == $side2 || $side2 == $side3 || $side1 == $side3) {
            return "isosceles triangle(สามเหลี่ยมหน้าจั่ว)";
        } else {
            return "scalene triangle(สามเหลี่ยมด้านไม่เท่า)";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $side1 = $_POST["side1"];
        $side2 = $_POST["side2"];
        $side3 = $_POST["side3"];

        $result = checkTriangleType($side1, $side2, $side3);
        echo "<h3 class='mt-5 {$result}'>ประเภทของสามเหลี่ยม: {$result}</h3>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
