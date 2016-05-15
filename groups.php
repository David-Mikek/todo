<?php

include_once './session.php';
is_admin();

require('fpdf.php');

include_once './header.php';
include_once './database.php';

$query = "SELECT * FROM groups";
$result = mysqli_query($link, $query);

echo '<a href="group_add.php">Dodaj skupino</a>';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


echo '<table border="1" cellspacing="0" cellpadding="0">';
echo '<tr>'
 . '<th>ID</th>'
 . '<th>Naziv</th>'
 . '<th>Akcije</th>'
 . '</tr>';
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['title'] . '</td>';
    echo '<td>'
    . '<a href="group.php?group_id=' . $row['id'] . '&e=test&ime=saša">Podrobno</a>'
    . '</td>';
    echo '</tr>';
    $str = iconv('UTF-8', 'windows-1252', $row['title']);
    $pdf->Cell(40,10,$str);        
}
echo '</table>';
//sharni mi PDF kot datoteko.
$pdf->Output('temp.pdf', 'F');
echo '<a href="temp.pdf">Prenesi PDF</a>';
?>

<?php

include_once './footer.php';
?>