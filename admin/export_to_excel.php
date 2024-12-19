<?php
require 'vendor/autoload.php';  // Path to PhpSpreadsheet library

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export'])) {
    // Include database connection
    include 'config.php'; // Adjust the path to your database connection file

    // Fetch data from the guest_feedback table
    $sql = "SELECT * FROM guest_feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set the header row
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Phone');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Room');
        $sheet->setCellValue('F1', 'Ambience');
        $sheet->setCellValue('G1', 'Check-in/Out');
        $sheet->setCellValue('H1', 'Reservation');
        $sheet->setCellValue('I1', 'Food');
        $sheet->setCellValue('J1', 'Quality');
        $sheet->setCellValue('K1', 'Service');
        $sheet->setCellValue('L1', 'Cleanliness');
        $sheet->setCellValue('M1', 'Decor');
        $sheet->setCellValue('N1', 'Air Condition');
        $sheet->setCellValue('O1', 'Supplies');
        $sheet->setCellValue('P1', 'Comfort');
        $sheet->setCellValue('Q1', 'Fittings');
        $sheet->setCellValue('R1', 'Choice');
        $sheet->setCellValue('S1', 'Purpose');
        $sheet->setCellValue('T1', 'Feedback');
        $sheet->setCellValue('U1', 'Submission Date');

        // Populate the rows with the database data
        $rowNum = 2; // Start from the second row
        while ($row = $result->fetch_assoc()) {
            $sheet->setCellValue('A' . $rowNum, $row['id']);
            $sheet->setCellValue('B' . $rowNum, $row['name']);
            $sheet->setCellValue('C' . $rowNum, $row['phone']);
            $sheet->setCellValue('D' . $rowNum, $row['email']);
            $sheet->setCellValue('E' . $rowNum, $row['room']);
            $sheet->setCellValue('F' . $rowNum, $row['ambience']);
            $sheet->setCellValue('G' . $rowNum, $row['checkinout']);
            $sheet->setCellValue('H' . $rowNum, $row['reservation']);
            $sheet->setCellValue('I' . $rowNum, $row['food']);
            $sheet->setCellValue('J' . $rowNum, $row['quality']);
            $sheet->setCellValue('K' . $rowNum, $row['service']);
            $sheet->setCellValue('L' . $rowNum, $row['cleanliness']);
            $sheet->setCellValue('M' . $rowNum, $row['decor']);
            $sheet->setCellValue('N' . $rowNum, $row['air_condition']);
            $sheet->setCellValue('O' . $rowNum, $row['supplies']);
            $sheet->setCellValue('P' . $rowNum, $row['comfort']);
            $sheet->setCellValue('Q' . $rowNum, $row['fittings']);
            $sheet->setCellValue('R' . $rowNum, $row['choice']);
            $sheet->setCellValue('S' . $rowNum, $row['purpose']);
            $sheet->setCellValue('T' . $rowNum, $row['feedback']);
            $sheet->setCellValue('U' . $rowNum, $row['submission_date']);
            $rowNum++;
        }

        // Create Excel file (Xlsx format)
        $writer = new Xlsx($spreadsheet);

        // Set the filename
        $filename = 'guest_feedback_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Set headers to force download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Save Excel file to output stream
        $writer->save('php://output');

    } else {
        echo "No data found to export.";
    }

    $conn->close();  // Close the database connection
}
?>
