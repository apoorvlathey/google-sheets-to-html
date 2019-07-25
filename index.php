<?php
$spreadsheet = "https://docs.google.com/spreadsheets/d/1RbHac8SCA1Tx_F0dKtjk7NZbF8yBuOgcX0q-JFhtpa4"; //Get Public Shareable Link from Google Sheets (without '/edit?usp=sharing')

$spreadsheet_url = $spreadsheet . "/export?gid=0&format=csv";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Google Sheets to HTML Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div>
        <table class="table table-striped table-bordered table-fixed">
            <thead>
                <?php
                $i = 1;
                $f = fopen($spreadsheet_url, "r");
                while (($line = fgetcsv($f)) !== false) {
                    if ($i == 1) {
                        echo "<tr>";
                        foreach ($line as $cell) {
                            echo "<th style='position: sticky; top: 0; background-color:#fff;'><b>" . htmlspecialchars($cell) . "</b></th>";
                        }
                        echo "</tr></thead><tbody>";

                        $i = 2;
                    } else {
                        echo "<tr>";
                        foreach ($line as $cell) {
                            echo "<td>" . htmlspecialchars($cell) . "</td>";
                        }
                        echo "</tr>\n";
                    }
                }
                fclose($f);
                ?>
                </tbody>
        </table>
    </div>
</body>

</html>