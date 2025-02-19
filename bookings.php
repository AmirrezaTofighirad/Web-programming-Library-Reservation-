<?php
session_start(); 
require('DBconnection.php');

$email = $_SESSION['email'];

// Handle Delete Booking Request
if (isset($_GET['delete_booking_id'])) {
    $booking_id = $_GET['delete_booking_id'];
    $delete_query = "DELETE FROM reservations WHERE id = $booking_id AND email = '$email'";
    if (mysqli_query($conn, $delete_query)) {
        header('Location: bookings.php'); 
        exit();
    } else {
        echo "Error deleting booking: " . mysqli_error($conn);
    }
}

// Handle Edit Booking Request
if (isset($_GET['edit_booking_id'])) {
    $booking_id = $_GET['edit_booking_id'];
    $query = "SELECT * FROM reservations WHERE id = $booking_id AND email = '$email'";
    $result = mysqli_query($conn, $query);
    $booking = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $reservation_date = $_POST['reservation_date'];
        $reservation_time = $_POST['reservation_time'];

        $update_query = "UPDATE reservations SET 
                         name='$name', 
                         phone='$phone', 
                         reservation_date='$reservation_date', 
                         reservation_time='$reservation_time'
                         WHERE id = $booking_id AND email = '$email'";

        if (mysqli_query($conn, $update_query)) {
            header('Location: bookings.php');
            exit();
        } else {
            echo "Error updating booking: " . mysqli_error($conn);
        }
    }
}

// Fetch all bookings for the logged-in user
$sql = "SELECT * FROM reservations WHERE email='$email'";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="css/bookings.css">
</head>
<body>
    <header>
        <h1>Bookings</h1>
        <nav>
            <a href="user_dashboard.php">Home</a>
        </nav>
    </header>

    <h1 class='title'>Your Bookings</h1>
    <div class="booking-list">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Reservation Date</th>
                    <th>Reservation Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['name']}</td> 
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['reservation_date']}</td>
                                <td>{$row['reservation_time']}</td>
                                <td>
                                    <a href='bookings.php?edit_booking_id={$row['id']}#edit-section' class='btn'>Edit</a>
                                    <a href='bookings.php?delete_booking_id={$row['id']}' class='btn delete-btn'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No bookings found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($_GET['edit_booking_id'])): ?>
    <section id="edit-section">
        <h2>Edit Booking</h2>
        <form action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $booking['name']; ?>" required>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="<?php echo $booking['phone']; ?>" required>

            <label for="reservation_date">Reservation Date:</label>
            <input type="date" name="reservation_date" value="<?php echo $booking['reservation_date']; ?>" required>

            <label for="reservation_time">Reservation Time:</label>
            <input type="time" name="reservation_time" value="<?php echo $booking['reservation_time']; ?>">

            <button type="submit" class="btn">Update</button>
        </form>
    </section>
    <?php endif; ?>

    <script src="js/script.js"></script>

</body>
</html>
